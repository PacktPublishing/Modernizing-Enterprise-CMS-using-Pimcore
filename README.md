
### Get this product for $5

<i>Packt is having its biggest sale of the year. Get this eBook or any other book, video, or course that you like just for $5 each</i>


<b><p align='center'>[Buy now](https://packt.link/9781801075404)</p></b>


<b><p align='center'>[Buy similar titles for just $5](https://subscription.packtpub.com/search)</p></b>


# Modernizing Enterprise CMS Using Pimcore

<a href="https://www.packtpub.com/product/modernizing-enterprise-cms-using-pimcore/9781801075404?utm_source=github&utm_medium=repository&utm_campaign=9781801075404"><img src="https://static.packt-cdn.com/products/9781801075404/cover/smaller" alt="Modernizing Enterprise CMS Using Pimcore" height="256px" align="right"></a>

This is the code repository for [Modernizing Enterprise CMS Using Pimcore](https://www.packtpub.com/product/modernizing-enterprise-cms-using-pimcore/9781801075404?utm_source=github&utm_medium=repository&utm_campaign=9781801075404), published by Packt.

**Discover techniques and best practices for creating custom websites with rich digital experiences**

## What is this book about?
Used by over eighty thousand companies worldwide, Pimcore is the leading open source enterprise-level content management system (CMS) solution. It is an impressive alternative to conventional CMSes, and is ideal for creating e-commerce and complex enterprise websites.

This book covers the following exciting features: 
* Create, edit, and manage Pimcore documents for your web pages
* Manage web assets in Pimcore using the digital asset management (DAM) feature
* Discover how to create layouts, templates, and custom widgets for your web pages
* Administer third-party addons for your Pimcore site using admin UI
* Discover practices to use Pimcore as a product information management (PIM) system

If you feel this book is for you, get your [copy](https://www.amazon.com/dp/1801075409) today!

<a href="https://www.packtpub.com/?utm_source=github&utm_medium=banner&utm_campaign=GitHubBanner"><img src="https://raw.githubusercontent.com/PacktPublishing/GitHub/master/GitHub.png" 
alt="https://www.packtpub.com/" border="5" /></a>


## Instructions and Navigations
All of the code is organized into folders. For example, Chapter04.

The code will look like the following:
```
<?php
namespace App\Controller;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\
Template;
class DefaultController extends FrontendController
{
/**
* @Template()
*/
public function defaultAction(Request $request)
{
}
}
```

**Following is what you need for this book:**

This book is for web developers and CMS professionals looking for an alternative to WordPress and traditional CMS. Enterprise application developers looking for enterprise solutions for digital transformation will find this book useful. Beginner-level knowledge of PHP, HTML, and CSS is needed to understand the code examples used in the book.

With the following software and hardware list you can run all code files present in the book (Chapter 1-14).

### Software and Hardware List

| Chapter  | Software required                                       | OS required                                                    |
| -------- | --------------------------------------------------------| ---------------------------------------------------------------|
| 1-14     | Docker                                                  | Windows 10, Mac OS 10.4+, and Linux (Any)                      |
| 1-14     | Visual Studio Code                                      | Windows, Mac OS X, and Linux (Any)                             |
| 1-14     | LAMP Stack(is required only if you're not using Docker) | Apache>= 2.4, PHP>=8.0, composer, MySQL 8.0+ or MariaDB 10.3+  |


This is a collection of tutorials and source code examples for learning Pimcore.  Pimcore is the leading opensource, enterprise-grade, DXP solution.
Following this tutorials you will discover basics.

## How the source code is structured
Each subfolder is a different test case. Enter the folder to get the info about the code. The number into the foldername match the chapter number inside the book.

## Examples list
*4. **Creating documents in Pimcore:** A ready website for testing CMS document features

*7. **Setting up Pimcore Development Environment:** A docker composer ready to go, with tips for windows user.


## Notes
1. each project must be self contained and docker based
2. each project must be activable just by hitting `docker-compose up`
3. you cannot commit the database, but you can share a SQL zipped files with the dump


## TODOS fulldemo
- [ ] class install
- [ ] link user to class
- [ ] create data object folders
- [ ] custom header image (template editable or setting?)


## Credits
Maarten van den Heuvel</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span> 

<span>Photo by <a href="https://unsplash.com/@alyson_jane?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Alyson McPhee</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span>

<span>Photo by <a href="https://unsplash.com/@ellaolsson?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Ella Olsson</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span>

## Color Images
We also provide a PDF file that has color images of the screenshots/diagrams used in this book. [Click here to download it](https://static.packt-cdn.com/downloads/9781801075404_ColorImages.pdf).


### Related products <Other books you may enjoy>
* Drupal 9 Module Development - Third Edition [[Packt]](https://www.packtpub.com/product/drupal-9-module-development-third-edition/9781800204621?utm_source=github&utm_medium=repository&utm_campaign=9781800204621) [[Amazon]](https://www.amazon.com/dp/1800204620)

* Workflow Automation with Microsoft Power Automate [[Packt]](https://www.packtpub.com/product/workflow-automation-with-microsoft-power-automate/9781839213793?utm_source=github&utm_medium=repository&utm_campaign=9781839213793) [[Amazon]](https://www.amazon.com/dp/1839213795)

## Get to Know the Authors
**Daniele Fontani**
is the CTO in Sintra Digital Business and has worked as a senior developer, team leader, and architect in a very large set of enterprise projects. He has a master’s degree in robotic science and another master’s degree in project management. His experience in technology extends to many technologies (Java, PHP, and .NET) and platforms (SharePoint, Liferay, and Pimcore) other than techniques (Agile, DevOps, and ALM). He is interested in Agile techniques, project management, and product development. He implemented DXP platforms for banks and worked in the loan industry as a team leader and software architect. In the pharma industry, he designed and developed retail portals for training and for the social engagement of retailers.

**Marco Guiducci**
is a certified Pimcore expert, team leader, and software engineer. He earned a master’s degree in information science in 2017 with a thesis on AI, focused on semantic text analysis. Since then, he has taken his first steps as a developer. He fell in love with PHP and Pimcore. Now, Marco has matured with long-term experience, documented by public speaking and contributions to the Pimcore code base. Inside the Pimcore ecosystem, he is focused on the PIM/DAM/MDM strategy and has delivered a broad set of enterprise projects across the world. He has designed and delivered a lot of PIM solutions for enterprises using Pimcore, integrating with major e-commerce solutions such as Shopify, Magento, and Shopware. He has also delivered B2B portals and websites using Pimcore and other technical solutions.

**Francesco Minà**
started programming in 1997 and, since that time, has followed the most important trends in digital innovation. He graduated with a degree in industrial automation in 2010 with a thesis on informatic science, in which he built a box for sending profiled marketing messages to customers on their devices, anticipating what would become the norm a few years later with modern social networks and tools. During his professional life, Francesco has worked as a senior developer on Magento, WordPress, Pimcore, and other CMS solutions. He is a solution architect and team leader in a digital innovation company, where he delivers a complete solution based on Pimcore. Francesco is active as a public speaker and an open source contributor. He developed an open source solution for delivering WordPress plugins and presented it as a best practice at many developer conferences. He developed erpselection.it, the first Italian software selection network. Throughout his career, he has delivered portals and B2B applications for the fashion and logistics industries.
  


### Download a free PDF

 <i>If you have already purchased a print or Kindle version of this book, you can get a DRM-free PDF version at no cost.<br>Simply click on the link to claim your free PDF.</i>
<p align="center"> <a href="https://packt.link/free-ebook/9781801075404">https://packt.link/free-ebook/9781801075404 </a> </p>