# Cron Queue Management System

## ภาพรวม

ระบบ Cron Queue ใหม่นี้จะทำงานทีละไฟล์แทนที่จะโหลดทั้งหมดพร้อมกัน เพื่อลดการใช้งานทรัพยากรของเซิร์ฟเวอร์

## คุณสมบัติ

- ✅ **ทำงานทีละไฟล์** - ไม่ทำงานหนักพร้อมกัน
- ✅ **ระบบ Priority** - งานสำคัญจะทำงานก่อน
- ✅ **Lock System** - ป้องกันการทำงานซ้ำ
- ✅ **Queue Management** - จัดการคิวงานอัตโนมัติ
- ✅ **Logging** - บันทึกการทำงานทั้งหมด
- ✅ **Error Handling** - จัดการข้อผิดพลาด

## การตั้งค่า Cron

### 1. ตั้งค่า Cron Job หลัก
```bash
# ทำงานทุก 1 นาที
* * * * * php /path/to/core/module/client/crons.php

# หรือทำงานทุก 2 นาที
*/2 * * * * php /path/to/core/module/client/crons.php
```

### 2. ตั้งค่า Cron Job สำหรับ Queue Manager (ไม่บังคับ)
```bash
# ตรวจสอบสถานะทุก 5 นาที
*/5 * * * * php /path/to/core/module/client/cron/queue_manager.php status
```

## การใช้งาน Queue Manager

### ตรวจสอบสถานะ
```bash
php queue_manager.php status
```

### รีเซ็ตคิว
```bash
php queue_manager.php reset
```

### ประมวลผลงานถัดไป
```bash
php queue_manager.php process
```

### ดู Log
```bash
php queue_manager.php log
```

## Priority Levels

| ไฟล์ | Priority | ความถี่ | คำอธิบาย |
|------|----------|--------|----------|
| balance_alert.php | 1 | 5 นาที | แจ้งเตือนยอดเงิน |
| api_orders.php | 2 | 1 นาที | ประมวลผล API orders |
| site_orders.php | 3 | 2 นาที | ประมวลผล site orders |
| sync.php | 4 | 5 นาที | ซิงค์ข้อมูล |
| providers.php | 5 | 10 นาที | อัพเดท providers |
| refill.php | 6 | 15 นาที | refill orders |
| dripfeed.php | 7 | 30 นาที | dripfeed orders |

## ไฟล์ที่สร้างขึ้น

- `cron.lock` - ไฟล์ล็อคป้องกันการทำงานซ้ำ
- `queue.json` - ข้อมูลคิวงาน
- `cron.log` - บันทึกการทำงาน

## การแก้ไขปัญหา

### 1. ลบ Lock ไฟล์
```bash
rm core/module/client/cron/cron.lock
```

### 2. รีเซ็ตคิว
```bash
php core/module/client/cron/queue_manager.php reset
```

### 3. ตรวจสอบ Log
```bash
php core/module/client/cron/queue_manager.php log
```

## การปรับแต่ง

### เปลี่ยนความถี่การทำงาน
แก้ไขในไฟล์ `crons.php` ในฟังก์ชัน `getInterval()`

### เปลี่ยน Priority
แก้ไขในไฟล์ `crons.php` ในฟังก์ชัน `getPriority()`

## ข้อดี

1. **ลดการใช้ทรัพยากร** - ทำงานทีละไฟล์
2. **ป้องกันการทำงานซ้ำ** - ใช้ lock system
3. **จัดการข้อผิดพลาด** - บันทึก error และ retry
4. **ติดตามการทำงาน** - มี log และ status
5. **ยืดหยุ่น** - ปรับแต่ง priority และ interval ได้ 