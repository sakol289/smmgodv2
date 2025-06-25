import subprocess
import os

fileversion = "version.txt"

def read_version():
    """อ่าน version ปัจจุบันจากไฟล์"""
    try:
        if os.path.exists(fileversion):
            with open(fileversion, "r") as f:
                version = f.read().strip()
                return float(version) if version else 1.00
        else:
            return 1.00  # ถ้าไม่มีไฟล์ เริ่มที่ 1.00
    except ValueError:
        print("ไฟล์ version.txt มีรูปแบบไม่ถูกต้อง เริ่มใหม่ที่ 1.00")
        return 1.00

def write_version(version):
    """เขียน version ใหม่ลงไฟล์"""
    with open(fileversion, "w") as f:
        f.write(f"{version:.2f}")

def git_push():
    try:
        # อ่าน version ปัจจุบัน
        current_version = read_version()
        
        # เพิ่ม version ใหม่ (บวก 0.01)
        new_version = current_version + 0.01
        
        # เขียน version ใหม่ลงไฟล์
        write_version(new_version)
        
        # Add ทุกอย่างไปยัง staging รวมถึง version.txt
        subprocess.run(["git", "add", "."], check=True)
        
        # รับข้อความ commit จากผู้ใช้
        # commit_message = input("Enter commit message: ")
        full_commit_message = f"(Version {new_version:.2f})"
        # full_commit_message = f"{commit_message} (Version {new_version:.2f})"
        
        # Commit การเปลี่ยนแปลง
        subprocess.run(["git", "commit", "-m", full_commit_message], check=True)
        
        # Push ไปยัง remote repository
        subprocess.run(["git", "push"], check=True)
        
        print(f"Changes pushed successfully. New version: {new_version:.2f}")
    except subprocess.CalledProcessError as e:
        print(f"An error occurred: {e}")
    except Exception as e:
        print(f"Unexpected error: {e}")

if __name__ == "__main__":
    git_push()