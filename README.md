<div id="top"></div>

<div align="center">
  <a href="#">
     <img src="https://cdn-icons-png.flaticon.com/512/9616/9616730.png" alt="VMS Logo" width="120" height="120">
  </a>

  <h2 align="center">نظام إدارة الزيارات الذكي (VMS)</h2>
  <p align="center"><strong>Smart Visitor Management & Security Solutions</strong></p>

  # Prototype
  https://merry-biscuit-f0.netlify.app/

  <p align="center">
    منظومة متكاملة لتنظيم حركة الزوار وتأمين المنشآت باستخدام تقنيات التحقق الرقمي.
    <br />
    <a href="#">View Demo</a>
    ·
    <a href="#">Documentation</a>
  </p>
</div>

<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>

## About The Project
يُعرف عصرنا الحالي بعصر الثورة التكنولوجية وانفجار المعرفة؛ حيث شهد العقد الأخير تقدماً هائلاً في مجال تكنولوجيا المعلومات حوّل العالم إلى قرية كونية صغيرة. وقد انعكس هذا التطور على المجالات الإدارية والأمنية داخل المؤسسات والمنشآت بشكل كبير؛ حيث ساعدت التكنولوجيا على إيجاد وسائل وأدوات حديثة سهّلت عملية تنظيم حركة الأفراد وجعلتها أكثر دقة وأماناً ومواكبة لتطورات العصر.

انطلاقاً من الرؤية نحو أتمتة العمليات الإدارية ورفع الكفاءة التشغيلية، تم تطوير هذا النظام الإلكتروني الذكي لإدارة الزيارات (Visitor Management System). يهدف النظام إلى تحويل السجلات الورقية التقليدية إلى منظومة رقمية مشفرة، مما يزيد من سرعة إنجاز العمل، ويقلل التكاليف، ويرفع مستوى الأداء الأمني من خلال:

    توليد تصاريح QR Code: تخصيص كود فريد لكل زيارة لضمان أقصى درجات الأمان ومنع التلاعب بالتصاريح.

    نظام القائمة السوداء (Blacklist): محرك أمني متطور لمنع دخول الأشخاص المحظورين آلياً وإصدار تنبيهات فورية.

    الأرشفة الرقمية والتقارير: سهولة الوصول لسجلات الزوار والتحركات في أي وقت، مع توفير تحليل دقيق للبيانات لدعم اتخاذ القرار.

يمثل هذا النظام حلولاً تقنية متطورة تساهم في خلق بيئة عمل آمنة ومنظمة، مما يعكس واجهة احترافية للمنشأة ويضمن سلاسة الإجراءات الإدارية بما يتوافق مع أحدث المعايير التكنولوجية.
### Built With

* [Laravel 10.x](https://laravel.com)
* [Tailwind CSS](https://tailwindcss.com/)
* [Simple QrCode](https://www.simplesoftware.io/#/docs/simple-qrcode)
* [MySQL](https://www.mysql.com/)

<p align="right">(<a href="#top">back to top</a>)</p>

## Getting Started

لإعداد المشروع محلياً على جهازك، اتبع الخطوات التالية:

### Prerequisites

* PHP >= 8.1
* Composer
* Node.js & NPM

### Installation

1. قم بتحميل المشروع (Clone):
   ```sh
   git clone [https://github.com/walee085296/prototype.git](https://github.com/walee085296/prototype.git)
### Installation

_Below is how you install and setup up your own version of the app._ 

1. Clone the repo
   ```sh
   git clone https://github.com/walee085296/prototype.git
   ```
   Or you can download the files manually.

2. Install NPM packages
   ```sh
   npm install
   ```
3. Install Composer packages
   ```sh
   Composer install && Composer update
   ```
4. Copy .env.example file to .env on the root folder.
   ```sh
   cp .env.example .env
   ```

5. Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration add (GITHUB_ID), (GITHUB_SECRET), (GITHUB_URL), (GITHUB_TOKEN) From your github.

6. Generate a key.
   ```sh
   php artisan key:generate
   ```

7. Migrate database.
   ```sh
   php artisan php artisan migrate --seed
   ```
8. Serve project.
   ```sh
   php artisan serve
   ```
Now you should be able to login with the default administrator account waleelink@gmail.com and password 12345678 which you can change later.
   
<p align="right">(<a href="#top">back to top</a>)</p>





<p align="right">(<a href="#top">back to top</a>)</p>

## Contact

waleed ali ahmed - waleelink@gmail.com
    <p >WhatsApp => <a href="https://wa.me/+201142881682">contact devolobers tem </a></p>
Project Link: [https://github.com/VMS(https://github.com/walee085296/prototype)

<p align="right">(<a href="#top">back to top</a>)</p>
