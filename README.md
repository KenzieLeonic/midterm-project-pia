# Midterm Project by PIA

> require: ต้องติดตั้ง docker และเปิดใช้งานอยู่ 

## จัดทำโดย 
1. ลีโอณิช เช็ง GitHub: KenzieLeonic
2. ณภัทร พัชโรภาสวงศ์ GitHub: aungpor
3.  พุธิตา จองศิริกุล GitHub: ployputita

## หลังจาก clone project
1. อย่าลืม `sail down` ใน Laravel Project อื่น
2. โหลดบน shell [https://laravel.com/docs/9.x/sail#installing-composer-dependencies-for-existing-projects](https://laravel.com/docs/9.x/sail#installing-composer-dependencies-for-existing-projects)
3. `cp .env.example .env`
4. ตรวจสอบไฟล์ .env ให้ถูกต้อง
5. `./vendor/bin/sail up -d`
6. `./vendor/bin/sail artisan key:generate`
7. `./vendor/bin/sail artisan migrate` 
8. `./vendor/bin/sail artisan db:seed` 
9. `./vendor/bin/sail npm run watch`

## ในงานนี้แบ่งทั้งหมด 5 ผู้ใช้งานหลักๆ ดังนี้  
1. Guest ผู้ใช้งานทั่วไป (บังคับให้ Login ก่อนถึงใช้งานเว็บนี้ได้)
2. User สามารถคอมเม้นได้ และ โพสตได้
3. StudentAffair สามารถเปลี่ยนแปลงสถานะการทำงานได้ 
4. Staff สามารถทำงานเหมือน Student Affair แต่เปลี่ยนสถานะคนละแบบ
4. Manager ทำงานได้เหมือน staff สามารถลบ,แก้ไข comment/โพสต ของตัวเองและ user คนอื่นได้ ดู dashboard ได้ 
5. Admin สามารถทำได้ทุกระบบ

## Default username และ password ในแต่ละ role 
- Role User
- Email: user01@example.com
- Password: userpass
---------------------------
- Role StudentAffair
- Email: student.affair@gmail.com
- Password: student.affair
---------------------------
- Role Manager
- Email: manager@gmail.com
- Password: managerpass
---------------------------
- Role Admin 
- Email: admin@example.com
- Password: adminpass


## (ภาคผนวก) Migration from Vite to Laravel Mix

> สำหรับเปลี่ยน Laravel Project ที่ใช้สอนในคาบเรียน

[https://github.com/laravel/vite-plugin/blob/main/UPGRADE.md#migrating-from-vite-to-laravel-mix](https://github.com/laravel/vite-plugin/blob/main/UPGRADE.md#migrating-from-vite-to-laravel-mix)
