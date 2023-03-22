from aiogram import types
from loader import dp
from utils import statistics
from environs import Env
import pymysql
from keyboards.default import menu
from datetime import datetime

env = Env()
env.read_env()

# Function action in super group, channel and group chats
@dp.message_handler()
async def all_msg_handler(message: types.Message):
	dbCon = pymysql.connect(
		env.str("dbHost"), 
		env.str("dbUser"), 
		env.str("dbPassword"), 
		env.str("dbName"),
		charset='utf8mb4',
		cursorclass=pymysql.cursors.DictCursor)
	cursor = dbCon.cursor()
	cursor.execute("SELECT voicyPath FROM voicy WHERE voicyName='" + message.text + "'")
	result = cursor.fetchone()
	print('[%s], %s' % (datetime.now(), result), message.chat.id)
	if result != None:
		await message.answer_voice(types.InputFile('data/voicy/%s' % result['voicyPath']), reply_markup=menu)
		statistics.anal(message.from_user.username, message.from_user.full_name, message.from_user.id, message.text, message.chat.id)

		
