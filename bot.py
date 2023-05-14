import telebot
from telebot.types import ReplyKeyboardMarkup, KeyboardButton

# تعريف التوكن الخاص بالبوت
bot = telebot.TeleBot('6130514839:AAFMu_hTp5RocecMSEFsjuYvU7XowMGcZak')

# إنشاء زر "Start"
start_button = KeyboardButton('/start')
start_button2 = KeyboardButton('/help')
# إنشاء قائمة لتضمين زر "Start"
start_keyboard = ReplyKeyboardMarkup()
start_keyboard.add(start_button)
start_keyboard.add(start_button2)

# التعامل مع رسالة البدء
@bot.message_handler(commands=['start'])
def send_welcome(message):
    # إنشاء رسالة ترحيبية تحتوي على زر "Start"
    welcome_message = "مرحباً بك في البوت!"
    bot.send_message(message.chat.id, welcome_message, reply_markup=start_keyboard)

@bot.message_handler(commands=['help'])
def send_welcome(message):
    # إنشاء رسالة ترحيبية تحتوي على زر "Start"
    welcome_message = "help you okay"
    bot.send_message(message.chat.id, welcome_message, reply_markup=start_keyboard)

@bot.message_handler(func=lambda message: True)
def unknown_command(message):
    bot.reply_to(message, "الأمر غير موجود")


# بدء تشغيل البوت
bot.polling()
