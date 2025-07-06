import re
from deep_translator import GoogleTranslator
import os

def is_turkish_word(word):
    # ตัวอักษรเฉพาะของภาษาตุรกี
    turkish_chars = r'[ğşıöüçĞŞİÖÜÇ]'
    return bool(re.search(turkish_chars, word, re.UNICODE))

def translate_and_replace_words(file_path):
    translations = []
    try:
        # ตรวจสอบว่าไฟล์มีอยู่
        if not os.path.exists(file_path):
            raise FileNotFoundError(f"ไฟล์ {file_path} ไม่พบ")
        
        # อ่านไฟล์
        with open(file_path, 'r', encoding='utf-8') as f:
            lines = f.readlines()
        
        # สร้างตัวแปลภาษา
        translator = GoogleTranslator(source='tr', target='en')
        
        # ตรวจสอบและแปลเฉพาะคำที่มีภาษาตุรกี
        modified_lines = []
        for i, line in enumerate(lines, 1):
            # แยกคำโดยใช้ whitespace และรักษาตัวคั่น
            words = re.split(r'(\W+)', line)  # แยกคำและตัวคั่น (เช่น ช่องว่าง, เครื่องหมายวรรคตอน)
            modified_words = []
            for word in words:
                if is_turkish_word(word):
                    # แปลเฉพาะคำที่มีตัวอักษรตุรกี
                    translated_word = translator.translate(word)
                    translations.append({
                        'line_number': i,
                        'original': word,
                        'translated': translated_word
                    })
                    modified_words.append(translated_word)
                else:
                    # คงคำหรือตัวคั่นที่ไม่ใช่ภาษาตุรกีไว้
                    modified_words.append(word)
            # รวมคำและตัวคั่นกลับเป็นบรรทัด
            modified_line = ''.join(modified_words)
            modified_lines.append(modified_line)
        
        # เขียนทับไฟล์ต้นฉบับ
        with open(file_path, 'w', encoding='utf-8') as f:
            f.writelines(modified_lines)
        
        # บันทึก log การแปลแยกต่างหาก
        log_file = os.path.splitext(file_path)[0] + '_translation_log.txt'
        with open(log_file, 'w', encoding='utf-8') as f:
            if translations:
                f.write("คำที่แปลจากภาษาตุรกีเป็นภาษาอังกฤษ:\n\n")
                for item in translations:
                    f.write(f"บรรทัด {item['line_number']}:\n")
                    f.write(f"คำต้นฉบับ: {item['original']}\n")
                    f.write(f"คำแปล: {item['translated']}\n\n")
            else:
                f.write("ไม่พบคำภาษาตุรกีในไฟล์\n")
        
        return translations, log_file
    
    except Exception as e:
        print(f"เกิดข้อผิดพลาด: {str(e)}")
        return [], None

# ตัวอย่างการใช้งาน
file_path = input("กรุณาใส่พาธไฟล์ที่ต้องการตรวจสอบและแปล (เช่น C:/folder/file.txt): ")
translations, log_file = translate_and_replace_words(file_path)
if translations:
    print(f"แปล {len(translations)} คำเรียบร้อย ไฟล์ต้นฉบับถูกอัปเดต รายละเอียดการแปลอยู่ใน {log_file}")
else:
    print(f"ไม่พบคำภาษาตุรกีหรือเกิดข้อผิดพลาด ตรวจสอบ {log_file} สำหรับรายละเอียด" if log_file else "เกิดข้อผิดพลาด กรุณาตรวจสอบไฟล์และลองใหม่")