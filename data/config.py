# Импорт настроек из файла .env
from environs import Env

# Теперь используем вместо библиотеки python-dotenv библиотеку environs
env = Env()
env.read_env()

# Забираем значение типа str
TOKEN = env.str("TOKEN")
# Тут у нас будет список из админов  
ADMINS = env.list("ADMINS")
# Тоже str, но для айпи адреса хоста
IP = env.str("ip")
