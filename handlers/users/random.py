from aiogram import types
from loader import dp
from utils import statistics
from data import config
from environs import Env
import pymysql

env = Env()
env.read_env()

@dp.message_handler(commands='random')
async def voice_random(message: types.Message):
    await message.answer("random")
    dbCon = pymysql.connect(env.str("dbHost"), 
		env.str("dbUser"), 
		env.str("dbPassword"), 
		env.str("dbName"),
		cursorclass=pymysql.cursors.DictCursor)
    statistics.anal(message.from_user.username, message.from_user.full_name, message.from_user.id, message.text,
                    message.chat.id)
    cursor = dbCon.cursor()
    cursor.execute("SELECT voicyPath FROM voicy ORDER BY rand() LIMIT 1")
    result = cursor.fetchone()
    cursor.close()
    dbCon.close()
    await message.answer_voice(types.InputFile('data/voicy/%s' % result['voicyPath']))