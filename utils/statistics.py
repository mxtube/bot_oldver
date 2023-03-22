from data import config
import datetime
from environs import Env
import pymysql

env = Env()
env.read_env()

def anal(name, fullName, userId, message, chatID):
    data = datetime.datetime.today().strftime("%Y-%m-%d %H:%M:%S")
    dbCon = pymysql.connect(env.str("dbHost"), 
		env.str("dbUser"), 
		env.str("dbPassword"), 
		env.str("dbName"),
		cursorclass=pymysql.cursors.DictCursor)
    cursor = dbCon.cursor()
    cursor.execute("INSERT INTO users(usersName, usersFullName, usersTGId, usersCommand, usersDate, usersChatID) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')" % (name, fullName, userId, message, data, chatID))
    dbCon.commit()
    cursor.close()