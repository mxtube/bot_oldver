from aiogram import types
from aiogram.dispatcher.filters.builtin import CommandStart
from utils import statistics
from utils import notify_new_user
from data.config import ADMINS
from data import config
from loader import dp
from keyboards.default import menu

@dp.message_handler(CommandStart())
async def bot_start(message: types.Message):
    text = f'''Привет, {message.from_user.full_name}!
Получается это бот 🤖 
🙌 Для работы бота в группе необходимо дать ему права администратора и включить все разрешения.
Бот создан при поддержки горящего пукана Александра, поддержи нас немного 🤑 4893 4705 1621 2450
Для обновления клавиатуры бота используйте команду /start
Если у вас что-то не работает напишите нашему начинающему разработчику @KirillKuznetsov'''
    check_user = notify_new_user.send_notify_new_user_to_admin(message.from_user.id)
    if check_user == 0:
            await dp.bot.send_message(155752773, "[Notify] New User: " + str(message.from_user.id) + ", " + message.from_user.username + ", " + message.from_user.full_name + "")
    statistics.anal(message.from_user.username, message.from_user.full_name, message.from_user.id, message.text, message.chat.id)
    await message.answer(text, reply_markup=menu)
