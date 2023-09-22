import telepot
import time
import requests

# Telegram bot tokeninizi buraya ekleyin
TOKEN = '6570003003:AAEFzJV-D5L1T8WgRgmG0kauniVhr0v-W2A'
bot = telepot.Bot(TOKEN)

# Gönderilecek mesaj ve telefon numaralarını belirleyin
mesajlar = [
    "Hşş, 5 dk sonra catering bilgilendirmesi atçan, unutma.",
    "14.00'de catering bilgilendirmesi yapılacak."
]

# Mesajı göndermek istediğiniz grup veya sohbetin ID'sini buraya ekleyin
telegram_IDleri = [
    '1292024684', # gökay
    '889869339',  # arzum
    '5267512088', # emirhan
    '733377854',  # feyza
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
]


bot.sendMessage(, "")

# Şu anki saati kontrol et
now = time.localtime()
saat = now.tm_hour
dakika = now.tm_min

# Mesaj gönderme fonksiyonunu tanımlayın
def mesaj_gonder(mesaj, telegram_IDleri):
    for telegram_ID in telegram_IDleri:
        bot.sendMessage(telegram_ID, mesaj)


# mesaj_gonder(mesajlar[0], telegram_IDleri)
while True:
    # Şu anki saati kontrol et
    now = time.localtime()
    saat = now.tm_hour
    dakika = now.tm_min

    if (saat == 8 and (dakika == 40 or dakika == 55)):
        mesaj_gonder(mesajlar[0], telegram_IDleri)
        break
    elif (saat == 13 and (dakika == 40 or dakika == 55)):
        mesaj_gonder(mesajlar[1], telegram_IDleri)
        break
    time.sleep(60)



#https://api.telegram.org/bot<TOKEN>/getUpdates