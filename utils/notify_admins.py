import logging
from aiogram import Dispatcher
from data.config import ADMINS
from data import config
from environs import Env
import pymysql

env = Env()
env.read_env()

async def on_startup_notify(dp: Dispatcher):
    dbCon = pymysql.connect(env.str("dbHost"), 
        env.str("dbUser"), 
        env.str("dbPassword"), 
        env.str("dbName"),
        cursorclass=pymysql.cursors.DictCursor)
    for admin in ADMINS:
        try:
            await dp.bot.send_message(admin, "[Notify] Бот запущен")
            cursor = dbCon.cursor()
            if cursor:
                await dp.bot.send_message(admin, "[Notify] Подключение к базе данных установлено")
        except Exception as err:
            logging.exception(err)

async def on_stopped_notify(dp: Dispatcher):
    for admin in ADMINS:
        try:
            await dp.bot.send_message(admin, "[Notify] Бот остановлен")
        except Exception as err:
            logging.exception(err)