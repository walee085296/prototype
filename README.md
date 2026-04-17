<div id="top"></div>
<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://advancedacademy.edu.eg/Katamia/RootPages/Default.aspx" />
     <img src="./Logo.png" alt=" المتطوره University" width="180" height="160">
  </a>

  <h3 align="center">Students Project Management System</h3>

  # prototype
https://merry-biscuit-f051ab.netlify.app/

# Figma prototype
https://www.figma.com/make/9P34JoNlXTop5F7iAwN8mS/%D9%86%D8%B8%D8%A7%D9%85-%D8%A7%D8%AF%D8%A7%D8%B1%D8%A9-%D9%85%D8%B4%D8%A7%D8%B1%D9%8A%D8%B9-%D8%A7%D9%84%D8%B7%D9%84%D8%A7%D8%A8?fullscreen=1


  <p align="center">
    An awesome way  to manage your student's projects!
    <br />
    <a href="#">Report Bugs</a>
    ·
    <a href="#">Request Feature</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
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



<!-- ABOUT THE PROJECT -->
## About The Project

يُعرف عصرنا الحالي بعصر الثورة التكنولوجية وانفجار المعرفة. شهد العقد الأخير من القرن العشرين وبداية القرن الحادي والعشرين تقدمًا هائلاً في مجال تكنولوجيا المعلومات، وقد حوّلت الوسائل التكنولوجية الحديثة العالم إلى قرية كونية صغيرة. انعكس هذا التطور في مجالات عديدة، إلا أن المجال الذي استفاد منه بشكل كبير هو التعليم؛ فقد ساعدت التكنولوجيا على إيجاد العديد من الوسائل والأدوات التي سهّلت العملية التعليمية وجعلتها أكثر مواكبة لتطورات العصر، ومسألة حضور التكنولوجيا في مجال التعليم أمرٌ لا مفر منه، حيث شهد مجال التعليم طفرةً كبيرة في أواخر القرن العشرين.
<br/>
تنافست المؤسسات التعليمية الحكومية والخاصة على إيجاد وتوفير وسائل فعّالة تُساعد الطالب على التعلّم بسهولة، وتُتيح له القدرة على الإبداع بفاعلية في دراسته وعمله المُستقبلي. يُسهّل توظيف التكنولوجيا في العملية التعليمية عملية التواصل والتفاعل بين الطالب والمعلم، بالإضافة إلى تسهيل العديد من العمليات الإدارية، كتحويل بعض العمليات الورقية إلى إلكترونية. وهذا بدوره سيؤدي إلى تطوير العمل الإداري، وتقليل الأعمال الورقية، وتحسين الخدمات بتقليل التنقل بين الإدارات لتداول الأعمال بين الموظفين، وتسهيل الوصول إلى المعلومات في أي وقت ومكان، وهذا بدوره سيؤدي إلى زيادة سرعة إنجاز العمل، وتقليل تكاليف العمل الإداري، مع رفع مستوى الأداء، بالإضافة إلى إمكانية التغلب على مشكلة البعد الجغرافي والزماني، وتطوير آلية العمل، ومواكبة التطورات.
<br/>
انطلاقاً من هذه النقطة عمل فريق المشروع على بناء نظام إلكتروني لإدارة مشاريع التخرج في المعهد العالي للدراسات المتطوره ، تم من خلاله أتمتة العمليات الإدارية كالتنسيق والإشراف على مشاريع التخرج وخلق بيئة أكثر تفاعلية وتطوراً بما يتوافق مع أهداف الجامعة وتوجهاتها نحو مواكبة التطور واستخدام التكنولوجيا في خدمة التعليم وجعله أكثر كفاءة وفعالية.
<br/>

<p align="right">(<a href="#top">back to top</a>)</p>



### Built With

This section should list any major frameworks/libraries used to bootstrap your project. Leave any add-ons/plugins for the acknowledgements section. Here are a few examples.

* [Laravel](https://laravel.com)
* [TailwindCss](https://tailwindcss.com/)
* [JQuery](https://jquery.com)
* [AlpineJs](https://alpinejs.dev/)
* [Rest API](https://docs.github.com/en/rest)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

Make sure you have all the prerequisites and either pull the project using your favorite tool or download it manually.

### Prerequisites

Make sure you have all the prerequisites before moving to the next section.
* npm^8.1.0
  ```sh
  sudo apt install nodejs.
  ```
* php^8.1.5
  ```sh
  sudo apt-get install php
  ```
* composer^2.1.11
  ```sh
  php composer-setup.php --install-dir=bin
  ```

### Installation

_Below is how you install and setup up your own version of the app._ 

1. Clone the repo
   ```sh
   git clone https://github.com/DU-EDU-SY/SPMS.git
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



<!-- USAGE EXAMPLES -->
## Usage

Create a new user, give them permission to create a group, create a group the create a project and all your work will be uploaded to github.
_For more details on how to use the project, please refer to the Documentation._

<p align="right">(<a href="#top">back to top</a>)</p>

## Contact

waleed ali ahmed - waleelink@gmail.com
    <p >WhatsApp => <a href="https://wa.me/+201142881682">contact devolobers tem </a></p>
Project Link: [https://github.com/SPM](https://github.com/walee085296/spms_project)

<p align="right">(<a href="#top">back to top</a>)</p>
