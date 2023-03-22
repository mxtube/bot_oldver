import logging
from aiogram import Dispatcher
from data.config import ADMINS
from data import config
from environs import Env
import pymysql

env = Env()
env.read_env()

def send_notify_new_user_to_admin(user_tg_id):
    dbCon = pymysql.connect(env.str("dbHost"),
		env.str("dbUser"), 
		env.str("dbPassword"), 
		env.str("dbName"),
		charset='utf8mb4',
		cursorclass=pymysql.cursors.DictCursor)
    cursor = dbCon.cursor()
    cursor.execute("SELECT COUNT(usersId) FROM users WHERE usersTGId='" + str(user_tg_id) + "'")
    result = cursor.fetchone()
    res = result['COUNT(usersId)']
    if res == 0:
        return res
