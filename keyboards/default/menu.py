from aiogram.types import ReplyKeyboardMarkup
from aiogram import types
from environs import Env
import pymysql

env = Env()
env.read_env()

main = []
menu = ReplyKeyboardMarkup(main, row_width=3, resize_keyboard=True)

dbCon = pymysql.connect(
	env.str("dbHost"), 
	env.str("dbUser"), 
	env.str("dbPassword"), 
	env.str("dbName"),
	cursorclass=pymysql.cursors.DictCursor)
cursor = dbCon.cursor()
cursor.execute("SELECT distinct(voicyName) FROM voicy")
result = cursor.fetchall()
for row in result:
    main.append(row['voicyName'])
menu.add(*(types.KeyboardButton(text) for text in main))
cursor.close
