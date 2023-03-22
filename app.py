from aiogram import executor
from aiogram import types
from loader import dp
from data.config import ADMINS
import middlewares, filters, handlers
from utils.notify_admins import on_startup_notify
from utils.notify_admins import on_stopped_notify

import aioschedule
import asyncio
import urllib3

async def on_startup(dispatcher):
    # Уведомляет про запуск
    await on_startup_notify(dispatcher)
    asyncio.create_task(scheduler())

async def scheduler():
    aioschedule.every().monday.at("07:30").do(send_message)
    aioschedule.every().monday.at("07:30").do(motivashion)
    aioschedule.every().day.at("07:30").do(nyaSlava)
    aioschedule.every().day.at("07:30").do(nyaDima)
    # aioschedule.every().minutes.do(checkKPResource)
    while True:
        await aioschedule.run_pending()
        await asyncio.sleep(1)


async def checkKPResource():
    http = urllib3.PoolManager()
    url = 'https://academy.kp11.ru/'
    resp = http.request('GET', url)
    if resp.status != 200:
        await dp.bot.send_message(-1001463910319, "[Notify] Сервис %s недоступен. Ошибка: %s" % (url, resp.status))

async def send_message():
    await dp.bot.send_voice(646386024, types.InputFile('data/voicy/pizdos.ogg'))   

async def motivashion():
    await dp.bot.send_voice(646386024 , types.InputFile('data/voicy/alpachino.ogg'))
    
async def nyaSlava():
    await dp.bot.send_voice(646386024 , types.InputFile('data/voicy/nya.ogg'))
    
async def nyaDima():
    await dp.bot.send_voice(451310395 , types.InputFile('data/voicy/nya.ogg'))

async def on_stopped(dispatcher):
    await on_stopped_notify(dispatcher) 

if __name__ == '__main__':
    executor.start_polling(dp, on_startup=on_startup, on_shutdown=on_stopped)
