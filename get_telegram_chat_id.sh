#!/bin/bash

# Token from your request
BOT_TOKEN="8335697937:AAHaWJ35IXir5ZhsPdmBaQLpRGx2tMn39Ng"

echo "=========================================================="
echo "🤖 Telegram Bot Chat ID Finder"
echo "=========================================================="
echo "1. Buka Telegram dan cari bot: @Deploycpnlbot"
echo "2. Klik 'Start' atau kirim pesan apa saja (misal: 'hello')"
echo "3. Setelah kirim pesan, tekan ENTER di sini..."
echo "=========================================================="
read -p "Tekan Enter jika sudah kirim pesan..."

echo ""
echo "🔍 Mengecek pesan..."

# Get updates from Telegram API
RESPONSE=$(curl -s "https://api.telegram.org/bot$BOT_TOKEN/getUpdates")

# Check if result is empty
if echo "$RESPONSE" | grep -q "\"result\":\[\]"; then
  echo "❌ Belum ada pesan masuk. Coba kirim pesan lagi ke bot dan jalankan ulang script ini."
  exit 1
fi

# Extract Chat ID using regex (simple parse to avoid jq dependency if not present, though jq is better)
# Looking for "chat":{"id":123456789
CHAT_ID=$(echo "$RESPONSE" | grep -o '"chat":{"id":-[0-9]*\|"chat":{"id":[0-9]*' | head -n 1 | sed 's/"chat":{"id"://')

if [ -z "$CHAT_ID" ]; then
    echo "❌ Gagal mengambil Chat ID. Raw response:"
    echo "$RESPONSE"
else
    echo "✅ DITEMUKAN!"
    echo "👉 Chat ID Anda: $CHAT_ID"
    echo ""
    echo "Gunakan Chat ID ini untuk GitHub Secret: TELEGRAM_CHAT_ID"
fi
