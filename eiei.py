import os
import re

def is_turkish_text(text):
    # ตัวอักษรเฉพาะของภาษาตุรกี
    turkish_chars = r'[ğşıöüçĞŞİÖÜÇ]'
    return bool(re.search(turkish_chars, text, re.UNICODE))

def find_turkish_files_with_lines(root_folder):
    turkish_files = []
    
    # เดินผ่านทุกโฟลเดอร์และซับโฟลเดอร์
    for root, dirs, files in os.walk(root_folder):
        for file in files:
            file_path = os.path.join(root, file)
            try:
                # อ่านไฟล์ข้อความ (รองรับ .txt, .py, .php, .html, .js, .md)
                if file.endswith(('.py', '.php', '.html')):
                    with open(file_path, 'r', encoding='utf-8') as f:
                        lines = f.readlines()
                        turkish_lines = []
                        # ตรวจสอบแต่ละบรรทัด
                        for i, line in enumerate(lines, 1):
                            if is_turkish_text(line):
                                # เก็บหมายเลขบรรทัดและเนื้อหา (ตัดช่องว่างท้าย)
                                turkish_lines.append({'line_number': i, 'content': line.strip()})
                        # ถ้าพบบรรทัดที่มีภาษาตุรกี เก็บข้อมูลไฟล์และบรรทัด
                        if turkish_lines:
                            turkish_files.append({
                                'file': file_path,
                                'lines': turkish_lines
                            })
            except (UnicodeDecodeError, IOError):
                # ข้ามไฟล์ที่ไม่สามารถอ่านได้
                continue
    
    return turkish_files

def save_to_file(file_list, output_file):
    with open(output_file, 'w', encoding='utf-8') as f:
        if file_list:
            f.write("ไฟล์ที่มีข้อความภาษาตุรกีและบรรทัด:\n")
            for item in file_list:
                f.write(f"\nไฟล์: {item['file']}\n")
                for line_info in item['lines']:
                    f.write(f"บรรทัด {line_info['line_number']}: {line_info['content']}\n")
        else:
            f.write("ไม่พบไฟล์ที่มีข้อความภาษาตุรกี\n")

# ตัวอย่างการใช้งาน
root_folder = input("กรุณาใส่พาธโฟลเดอร์ที่ต้องการค้นหา (เช่น C:/folder): ")
output_file = "turkish_files_with_lines_and_content.txt"

# ค้นหาและบันทึกผล
turkish_files = find_turkish_files_with_lines(root_folder)
save_to_file(turkish_files, output_file)
print(f"ผลลัพธ์ถูกบันทึกใน {output_file}")