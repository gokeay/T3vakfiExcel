import telepot
import time

# Telegram bot tokeninizi buraya ekleyin
TOKEN = '6606844840:AAGvOH7FQigJgIiN4eukK0u0bg2cx6HgcPY'

# Bot'u oluşturun
bot = telepot.Bot(TOKEN)

# Mesajı göndermek istediğiniz grup veya sohbetin ID'sini buraya ekleyin
group_chat_id = '-4064233966'

while True:
    try:
        # Mesajı gönder
        bot.sendMessage(group_chat_id, 'GOKAY AGLAMA')
        time.sleep(10)  # 10 saniye bekle
    except Exception as e:
        print(f'Hata oluştu: {e}')

#https://api.telegram.org/bot<TOKEN>/getUpdates