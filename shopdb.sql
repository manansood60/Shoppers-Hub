-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2018 at 08:50 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `ausername` varchar(255) NOT NULL,
  `apassword` varchar(255) NOT NULL,
  `aemail` varchar(255) NOT NULL,
  `abirthdate` date NOT NULL,
  `aimage` varchar(255) NOT NULL,
  `aname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `ausername`, `apassword`, `aemail`, `abirthdate`, `aimage`, `aname`) VALUES
(1, 'admin', 'admin', 'manansood60@gmail.com', '1997-12-21', '1516431451-267manan.jpg', 'Manan Kumar');

-- --------------------------------------------------------

--
-- Table structure for table `tblbanner`
--

CREATE TABLE `tblbanner` (
  `id` int(11) NOT NULL,
  `bimage` varchar(255) NOT NULL,
  `btitle` varchar(255) NOT NULL,
  `balt` varchar(255) NOT NULL,
  `btext` text NOT NULL,
  `bslogan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbanner`
--

INSERT INTO `tblbanner` (`id`, `bimage`, `btitle`, `balt`, `btext`, `bslogan`) VALUES
(6, '1517770387-8787banner1.jpg', 'ONLINE SHOP', 'Headphones, Best Shopping Website', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, <br/>sed do eiusmod tempor incididunt ut labore</p>\r\n', 'Best Products '),
(7, '1517770480-7185banner2.jpg', 'CANNON CAMERA', 'Canon Camera, Best Shopping Website', '<p>Lorem ipsum dolor sit amet.</p>\r\n', 'Best Professional Cameras'),
(8, '1517770524-1227banner3.jpg', 'I PHONE ', 'Iphone, Best Shopping Website', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, <br/>\r\nsed do eiusmod tempor incididunt ut labore</p>\r\n', 'New Phones Available');

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `size` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `adddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcart`
--

INSERT INTO `tblcart` (`id`, `pid`, `uid`, `size`, `qty`, `adddate`) VALUES
(45, 7, 7, 'M', 1, '2018-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `catname` varchar(50) NOT NULL,
  `catstatus` varchar(50) NOT NULL,
  `catcreatedate` date NOT NULL,
  `catmodifydate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `catname`, `catstatus`, `catcreatedate`, `catmodifydate`) VALUES
(1, 'MEN', 'available', '2018-01-11', '2018-01-11'),
(2, 'FEMALE', 'available', '2018-01-11', '2018-01-11'),
(3, 'KIDS', 'unavailable', '2018-01-11', '2018-01-11'),
(4, 'HOME', 'available', '2018-01-11', '2018-02-05'),
(5, 'ELECTRONICS', 'available', '2018-01-11', '2018-02-05'),
(7, 'BOOKS', 'available', '2018-01-11', '2018-02-05'),
(8, 'SPORTS', 'available', '2018-02-05', '2018-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `id` int(11) NOT NULL,
  `cemail` varchar(255) NOT NULL,
  `cnumber` varchar(255) NOT NULL,
  `caddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`id`, `cemail`, `cnumber`, `caddress`) VALUES
(3, 'manansood60@gmail.com', '+91 73555-88893', '#2497/11, st. no. 1, vishkarma town, Ludhiana, Punjab, India.');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactenquiry`
--

CREATE TABLE `tblcontactenquiry` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `ipaddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactenquiry`
--

INSERT INTO `tblcontactenquiry` (`id`, `name`, `email`, `message`, `phone`, `date`, `ipaddress`) VALUES
(1, 'Ramanpreet Singh', 'rspreet@gmail.com', 'Good Work.', '7696761753', '2018-02-26', '::1'),
(2, 'Durgalal Gupta', 'durgalal543@gmail.com', 'Keep it up.', '9803422042', '2018-02-26', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `tblevent`
--

CREATE TABLE `tblevent` (
  `id` int(11) NOT NULL,
  `etitle` varchar(255) NOT NULL,
  `edescription` text NOT NULL,
  `eofferdiscount` varchar(255) NOT NULL,
  `estartdate` date NOT NULL,
  `eenddate` date NOT NULL,
  `eimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblevent`
--

INSERT INTO `tblevent` (`id`, `etitle`, `edescription`, `eofferdiscount`, `estartdate`, `eenddate`, `eimage`) VALUES
(1, 'End of Season Sale', 'This Event is happening because of End of the Season.', '70', '2018-01-10', '2018-01-31', '1519456287-9524event1.png'),
(3, 'Spring Sale', 'Spring Sale the best prices.', '50', '2018-03-20', '2018-06-26', '1519456985-6073event2.png'),
(4, 'Boxing Day Sale', 'This Sale is Specially held for Boxing Day.', '50', '2018-03-01', '2018-07-31', '1519492585-3193event3.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `orderstatus` varchar(250) NOT NULL,
  `size` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `paymentmethod` varchar(250) NOT NULL,
  `orderdate` date NOT NULL,
  `price` varchar(255) NOT NULL,
  `ordernumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`id`, `uid`, `pid`, `orderstatus`, `size`, `qty`, `paymentmethod`, `orderdate`, `price`, `ordernumber`) VALUES
(16, 1, 7, 'Delivered', 'M', 2, 'COD', '2018-02-22', '1800', '1519275455-818'),
(17, 1, 26, 'Shipped', 'No Size', 3, 'COD', '2018-02-22', '2997', '1519275517-600'),
(18, 1, 25, 'Ordered', '8', 1, 'COD', '2018-02-22', '999', '1519275517-600'),
(19, 7, 10, 'Cancelled', 'L', 2, 'PayPal', '2018-02-22', '1000', '1519299756-932'),
(20, 7, 21, 'Ordered', '8', 1, 'PayPal', '2018-02-22', '499', '1519299756-932'),
(21, 7, 27, 'Delivered', 'No Size', 1, 'PayPal', '2018-02-22', '599', '1519299756-932'),
(22, 1, 18, 'Ordered', '32', 1, 'PayPal', '2018-02-24', '1499', '1519449031-95');

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `ptitle` varchar(255) NOT NULL,
  `pdescription` text NOT NULL,
  `pdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `ptitle`, `pdescription`, `pdate`) VALUES
(2, 'About', '<p>In <strong>February 2018</strong>, Manan Kumar, started Shoppershub.com - India&#39;s largest online marketplace, with the widest assortment of 60 million plus products across 800 categories from regional, national and international brands and retailers.</p>\r\n\r\n<p>With millions of users and more than 300,000 sellers, Snapdeal is the shopping destination for Internet users across the country, delivering to 6000+ cities and towns in India.</p>\r\n\r\n<p>In its journey till now, Snapdeal has partnered with several global marquee investors and individuals such as SoftBank, BlackRock, Temasek, Foxconn, Alibaba, eBay Inc., Premji Invest, Intel Capital, Bessemer Venture Partners, Mr. Ratan Tata, among others.</p>\r\n', '2018-02-16'),
(3, 'Terms', '<p>These are <strong>Demo <ins><em>Terms.</em></ins></strong></p>\r\n', '2018-02-16'),
(4, 'Disclaimer', '<p>This is a <strong>Demo <ins><em>Disclaimer</em></ins></strong>.</p>\r\n', '2018-01-25');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(11) NOT NULL,
  `pcid` int(11) NOT NULL,
  `pscid` int(11) NOT NULL,
  `producttitle` varchar(150) NOT NULL,
  `productdescription` text NOT NULL,
  `productprice` float NOT NULL,
  `productofferprice` float NOT NULL,
  `producttotalunits` int(11) NOT NULL,
  `productprimaryimage` varchar(200) NOT NULL,
  `productimage1` varchar(200) NOT NULL,
  `productimage2` varchar(200) NOT NULL,
  `productimage3` varchar(200) NOT NULL,
  `productcreatedate` date NOT NULL,
  `productmodifydate` date NOT NULL,
  `psid` int(11) NOT NULL,
  `productquantities` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `pcid`, `pscid`, `producttitle`, `productdescription`, `productprice`, `productofferprice`, `producttotalunits`, `productprimaryimage`, `productimage1`, `productimage2`, `productimage3`, `productcreatedate`, `productmodifydate`, `psid`, `productquantities`) VALUES
(7, 1, 16, 'Tinted Mens Hooded Shrug', 'Look stylish and stay warm by wearing this comfortable cardigan from Tinted. As the winter season is approaching, gear up your wardrobe with this trendy cardigan by Tinted Collection. For a complete ensemble team it up with a shirt, a pair of jeans or trousers and sneakers. ', 1200, 900, 100, '1517896344-7009img.jpg', '1517896344-5155img2.jpg', '1517896344-3544img1.jpg', '1517896344-9036img3.jpg', '2018-02-06', '2018-02-19', 3, '20,20,20,20,20'),
(8, 1, 16, 'Katso Mens hooded T-shirt', 'Fall in love with the soft texture as you adorn this Slim-Fit T-shirt from Katso Designs. Your skin will love the feel of this t-shirt as it is fashioned using the material that is famous for comfort - a Superior Blend of Cotton. You can Wear this T-Shirt for any Sporting activity or you can pair it with Jeans or Chinos to give the uber Casual Look ', 1200, 900, 100, '1517896548-6910mig.jpg', '1517896548-3mig3.jpg', '1517896548-5037mig1.jpg', '1517896548-2390mig2.jpg', '2018-02-06', '2018-02-19', 3, '20,20,20,20,20'),
(9, 1, 16, ' Pomo-Z Mens  Biker Jacket ', 'Mens Faux Leather Hooded Outerwear Jacket Classic Fit jacket will keep you warm and Looks Great Clean with damp sponge / Wipe dry Size Chart: SIZE S: Chest 40.9 Shoulder 17.3 Sleeve 23.6 Length 24 SIZE M: Chest 42.5 Shoulder 17.7 Sleeve 24 Length 24.8 SIZE L: Chest 44.1 Shoulder 18.5 Sleeve 24.4 Length 25.6 SIZE XL: Chest 45.7 Shoulder 18.9 Sleeve 25.2 Length 26.3 ', 2500, 2200, 110, '1517896926-5523nig.jpg', '1517896926-469nig1.jpg', '1517896926-3242nig3.jpg', '1517896926-7165nig2.jpg', '2018-02-06', '2018-02-19', 3, '15,20,25,35,15'),
(10, 1, 16, ' Gritstones Maroon Cut Sleeve Hooded Jacket ', 'Look absolutely confident wearing this fashionable Hooded Jacket from the house of Gritstones. With this Casual Hooded Jacket, you can choose to complete your look with your favourite jeans or Chinos and look effortlessly cool ', 600, 500, 110, '1517897207-2186lig.jpg', '1517897207-9950lig2.jpg', '1517897207-7318lig3.jpg', '1517897207-9566lig1.jpg', '2018-02-06', '2018-02-19', 3, '10,20,30,40,10'),
(11, 1, 16, ' Faux Leather Black jacket for Man ', 'Upgrade your layered look with this casual jacket from the house of Leather Retail. Warmth of leather, is perpetually pulled together and offers endless comfort. Make the world your fan as you don this truly timeless designer piece with a tee and jeans. Note :- Please check Size chart before order ', 2500, 1699, 105, '1517897405-9534log.jpg', '1517897405-3943log1.jpg', '1517897405-3171log2.jpg', '1517897405-5698log3.jpg', '2018-02-06', '2018-02-19', 3, '15,12,26,32,20'),
(12, 1, 16, ' Fanideaz Mens Full Sleeve Zipper Hoodies for Men', 'The indigenous fashion brand Fanideaz is known for bringing out vivid imaginations through their idiosyncratic designed staples. Take a dip into the brands latest collection of limited edition designed sweatshirt will give you casual rich look effortlessly. Beat the cold with this dapper long-sleeved sweatshirt from Stop. Make a lasting addition to your winter wear with this sweatshirt. It features contrasting colour scheme for a stylish look. The ribbed detailing and cuffed sleeves further enhance comfort and keeps you warm. Do not let excuses get in your way with Fanideaz colour blocked sweatshirt. This piece boasts cool patterning, Cool V neck feel with contrast side pockets stand out of all the sweatshirts for men. Wear yours with tapered sweatpants for an athletic look that is always on point. Charcoal grey, grey and Black colour block sweatshirts for men, has an attached hood with a drawstring fastening, a full zip closure, long sleeves. ', 1500, 1299, 135, '1517897706-5029kig.jpg', '1517897706-9214kig1.jpg', '1517897706-8959kig2.jpg', '1517897706-2903kig3.jpg', '2018-02-06', '2018-02-19', 3, '16,26,50,21,22'),
(13, 1, 17, ' Diverse Mens Slim Fit Cotton Casual Trousers ', 'In yarn-dyed cotton for lasting, deep colour, these flat-fronted trousers offer a clean aesthetic. The trousers have been finished with a zippered fly and button closure and belt loops on waistband. Part of the DIVERSE non-stretch trouser collection, offering these satin woven trousers so you can create your own sharp look. ', 650, 450, 185, '1518769984-5096ta1.jpg', '1518769984-4903ta2.jpg', '1518769984-8757ta3.jpg', '1518769984-6819ta4.jpg', '2018-02-16', '2018-02-19', 4, '20,25,30,35,40,20,15'),
(14, 1, 17, ' Nation Polo Club Mens Slim Fit Cotton Lycra Blend Casual Trouser ', 'Complete Your Casual Wardrobe With This Casual as well as Formal Cotton Lycra Blend Trouser From The House Of Nation Polo Club.The Fabric Used In This Trouser Is Sourced From The Legendary Mahalaxmi Mills. Ride High On Style With Its Buttoned Closure, Well Pocket Design. A Great Combination of this Trouser with Nation Polo Club Shirts with different color like Beige Color Shirt, Sky Blue Color Shirt, Pink Color Partywear Shirt, White Formal Shirt, Purple Color Casual Shirt, Black Color Shirt And Navy Blue Shirts etc. and You Want To Stay Comfortable And Stylish At Work with Nation Polo Club Sneaker, Boot, Loafer, Casuals etc.. ', 1000, 799, 181, '1518770071-4152tb1.jpg', '1518770071-176tb2.jpg', '1518770071-9054tb3.jpg', '1518770071-2277tb4.jpg', '2018-02-16', '2018-02-19', 4, '20,25,30,25,20,36,25'),
(15, 1, 17, 'Modo Mens Trouser Regular Fit Dobby,Dark Blue 100% Cotton Formal Trouser', 'Modo Mens Trouser Regular Fit Dobby, Blue 100% Cotton Formal Trouser For Men\r\n\r\nWhy Buy From Modo?\r\nWe have a constant eye on what is trending in todays market and manufacture accordingly. Modo includes an amazing range of formal wear. Our formal trousers for men regular fit are quite comfortable to wear and are skin friendly as well like our chinos trousers. These 100% cotton formal trousers for men will make you stand out in the crowd.\r\n\r\nWe actively monitor the feedbacks of our customers and strive contacting everyone to resolve their queries. Hence, we request & encourage our all valuable customers to leave a positive feedback if satisfied with our products, it helps other customers to make decisions on their purchase & us to improvise on our products & services.\r\n\r\nProduct Details:\r\nMaterial : 100% Cotton Formal Trouser For Men, Fit : Regular Fit\r\nColour: Blue Trouser, Style: Dobby Trouser For Men\r\nPackage Content : One Piece Formal Trouser For Men\r\nMade In India - 100% Cotton Guaranteed !!\r\nPlease note product colour may slightly vary due to photographic lighting sources on your monitor settings.\r\n\r\nPackage Content:\r\nPackage Content : One Piece Formal Trouser For Men\r\n\r\nSearch Esskay International To Find Our Below All Brands & Range Of Products:\r\n\r\n(A) Home Category:\r\nBedsheets: Dreamscape Bed Sheets | Home Ecstasy Bed Sheets | Snuggles Bed Sheets\r\nCurtains: Dreamscape Readymade Curtains\r\nWall Decals & Stickers: Home Decor Line Wall Stickers | Decofun Wall Stickers\r\n\r\n(B) Apparel Category:\r\nBrand Modo Apparels: Modo Formal Trousers | Modo Formal Ties | Modo Formal Shirts\r\nBrand Barata Apparels: Barata Formal Ties | Barata Casual Chinos Trousers', 1000, 899, 215, '1518770220-9447tc1.jpg', '1518770220-9998tc2.jpg', '1518770220-9259tc3.jpg', '1518770220-3504tc4.jpg', '2018-02-16', '2018-02-19', 4, '15,25,50,65,25,20,15'),
(16, 1, 17, 'Vbirds Mens Khakhi Cotton Cargo Pant ', 'Vbirds presents 100% Cotton Cargo Pant for men which gives stylish look to your personality. Wash inside out in cold water; use mild detergent; dry in shade; warm iron; bleeding or fading is the nature of cotton in repeat washes; do not bleach ', 2000, 1599, 219, '1518770298-4143td1.jpg', '1518770298-2492td2.jpg', '1518770298-9219td3.jpg', '1518770298-4738td4.jpg', '2018-02-16', '2018-02-19', 4, '20,25,60,54,45,10,5'),
(17, 1, 17, ' Modo Mens Trouser Regular Fit Dobby, Cream 100% Cotton Formal Trouser ', 'Modo Mens Trouser Regular Fit Dobby, Cream 100% Cotton Formal Trouser For Men\r\n\r\nWhy Buy From Modo?\r\nWe have a constant eye on what is trending in todays market and manufacture accordingly. Modo includes an amazing range of formal wear. Our formal trousers for men regular fit are quite comfortable to wear and are skin friendly as well like our chinos trousers. These 100% cotton formal trousers for men will make you stand out in the crowd.\r\n\r\nWe actively monitor the feedbacks of our customers and strive contacting everyone to resolve their queries. Hence, we request & encourage our all valuable customers to leave a positive feedback if satisfied with our products, it helps other customers to make decisions on their purchase & us to improvise on our products & services.\r\n\r\nProduct Details:\r\nMaterial : 100% Cotton Formal Trouser For Men, Fit : Regular Fit\r\nColour: Cream Trouser, Style: Dobby Trouser For Men\r\nPackage Content : One Piece Formal Trouser For Men\r\nMade In India - 100% Cotton Guaranteed !!\r\nPlease note product colour may slightly vary due to photographic lighting sources on your monitor settings.\r\n\r\nPackage Content:\r\nPackage Content : One Piece Formal Trouser For Men\r\n\r\nSearch Esskay International To Find Our Below All Brands & Range Of Products:\r\n\r\n(A) Home Category:\r\nBedsheets: Dreamscape Bed Sheets | Home Ecstasy Bed Sheets | Snuggles Bed Sheets\r\nCurtains: Dreamscape Readymade Curtains\r\nWall Decals & Stickers: Home Decor Line Wall Stickers | Decofun Wall Stickers\r\n\r\n(B) Apparel Category:\r\nBrand Modo Apparels: Modo Formal Trousers | Modo Formal Ties | Modo Formal Shirts\r\nBrand Barata Apparels: Barata Formal Ties | Barata Casual Chinos Trousers', 2000, 999, 185, '1518770474-1789te1.jpg', '1518770474-6451te2.jpg', '1518770474-8846te3.jpg', '1518770474-9780te4.jpg', '2018-02-16', '2018-02-19', 4, '20,15,30,35,50,20,15'),
(18, 1, 17, ' Beevee 100% Cotton Chemo Printed Lycra Grey Fixed Waist Cargo', 'Western Wear For Men ', 1800, 1499, 211, '1518770562-4571tf1.jpg', '1518770562-312tf2.jpg', '1518770562-7829tf3.jpg', '1518770562-4569tf4.jpg', '2018-02-16', '2018-02-16', 4, '25,32,35,64,20,15,20'),
(19, 1, 17, ' Krystle Mens Black Cotton Cargo Pant ', 'The Yash Store collection of cargo pants is ideal for hunters, casual outdoorsmen, or anyone who desires the combination of functional concealment or authentic, outdoor style. By pairing realistic patterns with branded heritage, you can get the true hunting look or feel, no matter the occasion. The collection features a variety of colors including Break-Up country, black, and khaki providing multiple options to show off the brand, the pattern and to represent the hunting lifestyle you love. These cargo pants are offered in 30 and 32 inch Inseams and available in waist sizes 30, 32, 34, 36, 38, and 40. Fiber content is 100% polyester, rip stop. Each pant is designed with button and zipper fly closure, six-pocket construction, belt loops, leg hem draw cords, and hidden button closure on both back pockets. For comfort, traditional waist labels have been replaced with heat transfers for a smoother, Tag-free feel. ', 2000, 999, 255, '1518770670-9677tg1.jpg', '1518770670-7513tg2.jpg', '1518770670-856tg3.jpg', '1518770670-42tg4.jpg', '2018-02-16', '2018-02-19', 4, '20,35,40,50,60,30,20'),
(20, 1, 18, ' Buwch Mens Formal Black Shoes ', 'BUWCH carries classic Slip-on design for a look that never goes out of style. This Shoe brings you comfort all day around. It is nice affordable shoes for everyday use, or wedding or formal occasion. Buwch makes a statement of its own with a variety in mens casual footwear with unique style and new trends for every occasion. Designed with toughness and elegance, it is made for every road beneath your feet. ', 800, 599, 160, '1518778381-138sf1.jpg', '1518778381-1558sf2.jpg', '1518778381-555sf3.jpg', '1518778381-1060sf4.jpg', '2018-02-16', '2018-02-19', 2, '10,20,30,40,30,20,10'),
(21, 1, 18, ' Essence Mens VC 3101 High Top Shoes ', ' Essence The Footwear That Suits Your Personality. Our Footwear Are Made With Premium Quality Material And The Craftsmanship Offers You Trendy Design With Long Lasting Performance.All Essence Products Are Originally And Genuinely Crafted By Skilled Indian Craftsmen.We Are Not Replicating Any International Brands Or Products.\r\n\r\nImportant Features:-\r\n\r\nâ€¢ Sole Material : AirMix\r\n\r\nâ€¢ It can be worn on all your Formal or party wear or as well as any occasions.', 1299, 499, 160, '1518778500-9014se1.jpg', '1518778500-9638se2.jpg', '1518778500-9382se3.jpg', '1518778500-8817se4.jpg', '2018-02-16', '2018-02-19', 2, '20,30,40,30,20,10,10'),
(25, 1, 18, ' REVOKE From Walktoe Mens Casual Loafer ', 'Give a revived touch to your look by wearing this pair of casual shoes from the house of REVOKE. Featuring this stylish pair of shoes having a Leather upper material with excellent finish, these shoes for mens have a durable outsole for outstanding durability. ', 1200, 999, 230, '1518778932-9634sa1.jpg', '1518778932-9731sa2.jpg', '1518778932-1994sa3.jpg', '1518778932-6058sa4.jpg', '2018-02-16', '2018-02-19', 2, '20,30,40,50,40,30,20'),
(26, 1, 22, ' Titan Original Black Mens Wallet trifold (TW158LM2BK) ', 'Watches not only help you keep track of time but also add elegance and complete your look. When it comes to timepieces, Titan is a well-known brand that is trusted by an entire country. They have a varied collection of watches in different designs for both men and women. This truly makes Titan watches a preferred brand among people of all ages. Head on over to and pick out your favourite Titan watch from a range of classy and elegant timepieces. Choose Titan watches of different designs and styles to team up with your attire for various occasions.With the varied range of Titan watches for men and women, get ready to be amazed as you choose a watch for yourself or your loved ones. Titan offers an amazing range of watches for men as well. Pick up Titan Karishma watches for men with metal straps and pair these with your formal office clothes. Explore a wide range of Titan watches for men with leather straps that look great with both formal as well as casual wear. For a sporty look, try on a Titan Octane analog watch. The Titan Raga series of timepieces are a stunning collection of watches for ladies. Beautifully designed and crafted, these watches will look extremely elegant on your wrist. You can also find Titan watches for ladies, with leather as well as metallic straps. Titan couple watches also make for great birthday and anniversary gifts for your loved ones to make their special day, extra memorable. ', 1300, 999, 70, '1518790975-7854wf1.jpg', '1518790975-4730wf2.jpg', '1518790975-4740wf3.jpg', '1518790975-6932wf4.jpg', '2018-02-16', '2018-02-16', 1, '0'),
(27, 1, 22, ' Hornbull Mens Brown Odense Leather RFID Blocking Wallet ', 'Hornbull Helps People Navigate The World Easily And Simply With The Highest Quality Wallets, Card Cases And Passport Holders! Hornbull Came Out Of A Space In The Market Where We Saw Almost Not High Quality Wallets Or Passport Holders -At Least None That We Would Buy, Anyway. We Make The Best Wallets, Card Cases And Passport Holders At The Most Competitive Prices Across The Industry. A Few Of The Reasons You Should Buy From Us: Ã‚â‚¬Â¢ Every Hornbull Product Has An Elegant Design, Perfect Size With A Luxurious Feel And Contrasting Threading In Some Wallets To Keep Up With Consistent And Long-Term Use - For Years If Not Decades. Ã‚â‚¬Â¢ Courteous, Knowledgeable And Professional Support. Ã‚â‚¬Â¢ Tons Of Satisfied Customers. Ã‚â‚¬Â¢ Quality Name Brand And Top Grained Natural Leather Products. Try It, You Will Love Our Products. Ã‚â‚¬Â¢ Everyone That Uses Our Products, Come Back For More. We Must Be Doing Something Right! All Of Hornbull Products Are Made From Top Grained Natural Leather. We Are Proud To Say That Our Products Are Made In India. Each Of Our Wallets, Card Cases, And Passport Holder Are Handcrafted In Kolkata, India. Our Products Will Only Get Better As It Ages. When It Comes To The Quality We Follow A Stringent Standard And You Can Find All Of Our Products Under Hornbull. The Bottom Line Is We Love Our Customers, And Our Customers Love Our Products! ', 1500, 599, 50, '1518792083-1375we1.jpg', '1518792083-4347we2.jpg', '1518792083-3084we3.jpg', '1518792083-3372we4.jpg', '2018-02-16', '2018-02-16', 1, '0'),
(28, 1, 22, ' Hornbull Mens Washed Brown Rigohill Leather Wallet ', 'The Best Pure Leather Wallets For Men! Is Your Existing Wallet Needed To Be Replaced? Do You Want To Have The Best Pure Leather Wallet On Your Cart? You Have Come To The Right Place! When It Comes To Best Wallet Brands For Men, There Is Nothing That Can Beat What We Can Offer! Welcome To Hornbull, The Home Of The Most Elegant And Stylish Wallets For Men! We Have Made Mens Wallets That Are Available Your Needs. Whatever Your Preferred Style Is, Just Name It And You Will Have It! Honbull Sells Different Highly Quality Products To Choose From. All Of Our Leather Wallets Are Made Of Genuine Leather And Are Sewn With Elegance And Durability In Mind. We Have In House Production Unit With Almost All Styles Of Wallets, And Even The Classical Ones Are Available. . Here At Hornbull, We All Know That Men Do Have Different Tastes And Preferences When It Comes To Everything, Including The Best Wallets For Them. Hence, We Make Sure That Our Collection Will Have Something To Offer Them To Suit Their Needs And Specifications So Don not Waste Your Time Somewhere Else. Hornbull Is Here To Help You About Your Needs. ', 1450, 699, 45, '1518792188-3400wd1.jpg', '1518792188-3213wd2.jpg', '1518792188-5099wd3.jpg', '1518792188-6174wd4.jpg', '2018-02-16', '2018-02-16', 1, '0'),
(29, 1, 22, ' Wildhorn Blue Leather Mens Wallet ', 'This Is A High-Quality Classic Genuine Leather Wallet From Wildhorn. This Wallet Acts As The Perfect Accessory To Complete Your Look And Make You Stand Out. Featuring An Elegant Design, Hand Stitched; Dyed And Aged This Wallet Is Long-Lasting, Light Weight And A Fine Quality Genuine Leather Product. It Shows Your Personality And Style Every Time You Pull It Out. This Smooth Rich, Supple, And Luxurious Leather Wallet Has Been Made Out Of Top Grain Genuine Leather And It is A Natural Thing Where Colour Variation Is Never Under Control. If You Are Using First Time Or Have Least Knowledge About Pure Leather Then Do not Worry About Its Colour Variation. Pure Leather Wallets Get More Beautiful On Ageing. These Are Not Pu Which Will Contain Shine On Its Surface. Product Colour May Slightly Vary Due To Photographic Lighting Sources Or Your Monitor Setting. Material Care Instruction: If Leather Gets Too Wet: Dry It Slowly. Speed Drying Leather Changes Its Chemical Structure And You End Up With Stiff Crinkle Cut Chaos. So Aim For Room Temperature Drying With Gentle Air Rather Than Direct Heater Time With A Hair-Dryer. And Keep It In The Shape You Want It To End Up, As Leather Will Remember The Shape It Was When Wet. ', 1200, 499, 50, '1518792309-9390wc1.jpg', '1518792309-4247wc2.jpg', '1518792309-3423wc3.jpg', '1518792309-6612wc4.jpg', '2018-02-16', '2018-02-16', 1, '0'),
(30, 1, 22, ' Hornbull Mens Brown Themes Leather RFID Blocking Wallet ', 'Hornbull Helps People Navigate The World Easily And Simply With The Highest Quality Wallets, Card Cases And Passport Holders! Hornbull Came Out Of A Space In The Market Where We Saw Almost Not High Quality Wallets Or Passport Holders. We Make The Best Wallets, Card Cases And Passport Holders At The Most Competitive Prices Across The Industry. A Few Of The Reasons You Should Buy From Us: Every Hornbull Product Has An Elegant Design, Perfect Size With A Luxurious Feel And Contrasting Threading In Some Wallets To Keep Up With Consistent And Long-Term Use - For Years If Not Decades. Lowest Pricing Available Online. Courteous, Knowledgeable And Professional Support. Tons Of Satisfied Customers.Quality Name Brand And Top Grained Natural Leather Products. Try It, You Will Love Our Products.Everyone That Uses Our Products, Come Back For More. We Must Be Doing Something Right! All Of Hornbull Products Are Made From Top Grained Natural Leather. We Are Proud To Say That Our Products Are Made In India. Each Of Our Wallets, Card Cases, And Passport Holder Are Handcrafted In Kolkata, India. Our Products Will Only Get Better As It Ages. When It Comes To The Quality We Follow A Stringent Standard And You Can Find All Of Our Products Under Hornbull. The Bottom Line Is We Love Our Customers, And Our Customers Love Our Products! ', 1800, 599, 40, '1518792452-7783wb1.jpg', '1518792452-7136wb2.jpg', '1518792452-3993wb3.jpg', '1518792452-1874wb4.jpg', '2018-02-16', '2018-02-16', 1, '0'),
(31, 1, 22, ' Wildhorn Genuine Leather Wallet 015 ', 'This wallet exposes bold look and elegant design. It carries all yours cash and coins. It is slim,so will fit comfortably in your pocket. The multiple compartments will hold everything you need when on the go and keep your items secure and organized. It is made from genuine leather. Durable and stylish. ', 1500, 499, 40, '1518792532-2015wa1.jpg', '1518792532-6568wa2.jpg', '1518792532-7747wa3.jpg', '1518792532-4148wa4.jpg', '2018-02-16', '2018-02-16', 1, '0'),
(32, 1, 23, ' Dennis Lingo Mens Solid Chinese Collar Green Casual Shirt ', 'This Casual Checkered shirt has a spread collar, A full button Placket, Long Sleeves, Yoke on the shoulder, and a curved hemline\r\n\r\nSize and Fit\r\n\r\n    Slim Fit\r\n    The Model (height 6 foot and shoulders 18 inches is wearing size 40/L\r\n    Please check the size chart for more details before ordering\r\n\r\n    Material & Care\r\n\r\n    100% Premium Cotton (Machine Wash Regular)\r\n\r\n    Style Tip\r\n\r\n    Enhance your look by wearing this trendy shirt. Team it with a pair of Chinos and white sneakers for a fun Smart Casual look\r\n\r\n    About the Brand DENNIS LINGO\r\n\r\n    Finding Basic Menswear for daily use can be hard among todays Fast fashion world, where trends change daily. That is why we started Dennis Lingo, to create a one stop shop for premium essential clothing for everyday use at rock bottom prices', 700, 549, 220, '1519575408-4531sa1.jpg', '1519575408-9927sa2.jpg', '1519575408-1665sa3.jpg', '1519575408-2756sa4.jpg', '2018-02-25', '2018-02-25', 3, '20,40,50,60,50'),
(33, 1, 23, ' Dennis Lingo Mens Cotton Black Solid Casual Shirt ', 'This Casual Checkered shirt has a spread collar, A full button Placket, Long Sleeves, Yoke on the shoulder, and a curved hemline\r\n\r\nSize and Fit\r\n\r\n    Slim Fit\r\n    The Model (height 6 foot and shoulders 18 inches is wearing size 40/L\r\n    Please check the size chart for more details before ordering\r\n\r\n    Material & Care\r\n\r\n    100% Premium Cotton (Machine Wash Regular)\r\n\r\n    Style Tip\r\n\r\n    Enhance your look by wearing this trendy shirt. Team it with a pair of Chinos and white sneakers for a fun Smart Casual look\r\n\r\n    About the Brand DENNIS LINGO\r\n\r\n    Finding Basic Menswear for daily use can be hard among todays Fast fashion world, where trends change daily. That is why we started Dennis Lingo, to create a one stop shop for premium essential clothing for everyday use at rock bottom prices', 700, 549, 220, '1519575513-7473sb1.jpg', '1519575513-8217sb2.jpg', '1519575513-9750sb3.jpg', '1519575513-7996sb4.jpg', '2018-02-25', '2018-02-25', 3, '30,40,50,60,40'),
(34, 1, 23, ' Jugend Slim Fit Casual Purple Cotton Shirts For Men ', 'A perfect pick for your next party is this Purple coloured, Casual shirt from Jugend. Featuring Slim fit, it is tailored using finest quality Cotton Satin fabric. This full-sleeved shirt will keep you relaxed and add to your sophisticated charm. Club this Casual shirt with a pair of formal trousers ya jeans and lace-ups to flaunt a distinct look. ', 1299, 629, 190, '1519575602-6046sc1.jpg', '1519575602-8298sc2.jpg', '1519575602-1790sd3.jpg', '1519575602-959sd4.jpg', '2018-02-25', '2018-02-25', 3, '25,35,45,65,20'),
(35, 1, 23, ' Black Orange Pure Linen beautiful Denim Mens Shirt Cross ', 'Give an exquisite look with this Denim colored shirt from Black Orange. Made from Pure Linen, this slim perk features full sleeves. This casual check wear is stylish and potentially eye-ball grabber. ', 3200, 1599, 177, '1519575691-7099se1.jpg', '1519575691-8751se2.jpg', '1519575691-4279se3.jpg', '1519575691-2886se4.jpg', '2018-02-25', '2018-02-25', 3, '30,40,50,25,32'),
(36, 1, 23, ' Symbol Mens Casual Regular Fit Shirt ', 'Give an exquisite look with this Denim colored shirt from Black Orange. Made from Pure Linen, this slim perk features full sleeves. This casual check wear is stylish and potentially eye-ball grabber. ', 1800, 799, 272, '1519575793-5321sf1.jpg', '1519575793-513sf2.jpg', '1519575793-9405sf3.jpg', '1519575793-2216sf4.jpg', '2018-02-25', '2018-02-25', 3, '25,35,82,90,40'),
(37, 1, 23, ' Jack & Jones Mens Checkered Slim Fit Linen Casual Shirt ', 'Give an exquisite look with this Denim colored shirt from Black Orange. Made from Pure Linen, this slim perk features full sleeves. This casual check wear is stylish and potentially eye-ball grabber. ', 3000, 1499, 194, '1519575885-398sg1.jpg', '1519575885-9520sg2.jpg', '1519575885-4355sg3.jpg', '1519575885-2386sg4.jpg', '2018-02-25', '2018-02-25', 3, '20,60,49,40,25'),
(38, 1, 24, ' Spykar Mens Solid Slim Fit T-Shirt ', 'Play it cool this season by wearing this T-shirt from the fashion brand Spykar. This is a trendy T-shirt pair this T-shirt with denim bottoms and sneakers for a hip look. ', 1600, 879, 180, '1519576812-700ta1.jpg', '1519576812-7518ta2.jpg', '1519576812-1142ta3.jpg', '1519576812-7181ta4.jpg', '2018-02-25', '2018-02-25', 3, '20,40,50,60,10'),
(39, 1, 24, ' Mr.stag Space Print Mens Round Neck Navy Blue Half Sleeves T-Shirt ', 'Look your stylish best in this trendy colour half sleeve t-shirt from the latest collection of Mr. Stag. The youthful design, high-quality 100% cotton fabric, custom fit make it a must have for this season. Let us you know about recent trends and demands . Best way to look cool and comfortable .Update your wardrobe with something stylish in the form of this half sleeve t-shirt from Mr. Stag . This t-shirt is perfect for casual or formal all day event . ', 700, 449, 230, '1519576913-4664tb1.jpg', '1519576913-5178tb2.jpg', '1519576913-9197tb3.jpg', '1519576913-5847tb4.jpg', '2018-02-25', '2018-02-25', 3, '30,45,65,50,40'),
(40, 1, 24, ' V3Squared Mens Cotton Half Sleeve Tshirt ', 'Enhance your look with this t-shirt and you will love yourself for buying it. The colour and pattern of the t-shirt will make you look every bit attractive. Wear it and look great. Furthermore, the fabric of the t-shirt is such that it ensures a comfortable wear for you throughout the day. ', 1299, 469, 161, '1519577014-7358tc1.jpg', '1519577014-4459tc2.jpg', '1519577014-3952tc3.jpg', '1519577014-4727tc4.jpg', '2018-02-25', '2018-02-25', 3, '20,45,45,45,6'),
(41, 1, 24, ' Mufti Mens Mid Rise Slim Fit Tshirts ', 'End your search for a summery top wear with this light orange coloured T-shirt by Mufti. Adorned with captivating floral print all over, it will become one of the smartest pick of the season. This T-shirt features half sleeves and round neck to make it an ideal wear for casual outings. Team it up with a pair of wash-effect denim shorts and lace-up sneakers to flaunt a laidback avatar. ', 1000, 769, 230, '1519577113-3470td1.jpg', '1519577113-6299td3.jpg', '1519577113-7593td2.jpg', '1519577113-2260td4.jpg', '2018-02-25', '2018-02-25', 3, '40,50,55,65,20');

-- --------------------------------------------------------

--
-- Table structure for table `tblsizechart`
--

CREATE TABLE `tblsizechart` (
  `id` int(11) NOT NULL,
  `size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsizechart`
--

INSERT INTO `tblsizechart` (`id`, `size`) VALUES
(1, 'No Size'),
(2, '6,7,8,9,10,11,12'),
(3, 'S,M,L,XL,XXL'),
(4, '28,30,32,34,36,38,40'),
(5, '2-3 Years,3-4 Years,4-5 Years,5-6 Years, 6-7 Years, 7-8 Years');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `subcatname` varchar(200) NOT NULL,
  `subcatstatus` varchar(50) NOT NULL,
  `subcatcreatedate` date NOT NULL,
  `subcatmodifydate` date NOT NULL,
  `sizeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`id`, `catid`, `subcatname`, `subcatstatus`, `subcatcreatedate`, `subcatmodifydate`, `sizeid`) VALUES
(16, 1, 'Jackets', 'available', '2018-01-11', '2018-02-05', 3),
(17, 1, 'Trousers', 'available', '2018-01-11', '2018-02-05', 4),
(18, 1, 'Shoes', 'available', '2018-01-11', '2018-02-05', 2),
(19, 2, 'Jeans', 'available', '2018-01-11', '2018-02-05', 4),
(21, 2, 'Jewellery', 'unavailable', '2018-01-11', '2018-02-05', 1),
(22, 1, 'Wallets', 'available', '2018-02-05', '2018-02-05', 1),
(23, 1, 'Shirts', 'available', '2018-02-05', '2018-02-05', 3),
(24, 1, 'T-Shirts', 'available', '2018-02-05', '2018-02-05', 3),
(25, 2, 'Accessories', 'available', '2018-02-05', '2018-02-05', 1),
(26, 2, 'Footwear', 'available', '2018-02-05', '2018-02-05', 2),
(27, 2, 'Tops', 'available', '2018-02-05', '2018-02-05', 3),
(28, 2, 'Suits', 'available', '2018-02-05', '2018-02-05', 1),
(29, 3, 'Toys & Games', 'available', '2018-02-16', '2018-02-16', 1),
(30, 3, 'Kids Clothing', 'available', '2018-02-16', '2018-02-16', 5),
(31, 3, 'Kids Watches', 'available', '2018-02-16', '2018-02-16', 1),
(32, 3, 'School Bag', 'available', '2018-02-16', '2018-02-16', 1),
(33, 3, 'Baby Fashion', 'available', '2018-02-16', '2018-02-16', 1),
(34, 3, 'Others', 'available', '2018-02-16', '2018-02-16', 1),
(35, 4, 'Kitchen & Dining', 'unavailable', '2018-02-16', '2018-02-16', 1),
(36, 4, 'Furniture', 'unavailable', '2018-02-16', '2018-02-16', 1),
(37, 4, 'Home Decor', 'unavailable', '2018-02-16', '2018-02-16', 1),
(38, 4, 'Garden & Outdoors', 'unavailable', '2018-02-16', '2018-02-16', 1),
(39, 4, 'Home Storage', 'unavailable', '2018-02-16', '2018-02-16', 1),
(40, 4, 'All Pet Supplies', 'unavailable', '2018-02-16', '2018-02-16', 1),
(41, 5, 'Mobiles', 'available', '2018-02-16', '2018-02-16', 1),
(42, 5, 'Laptops', 'available', '2018-02-16', '2018-02-16', 1),
(43, 7, 'Fiction Books', 'available', '2018-02-16', '2018-02-16', 1),
(44, 7, 'School Text Books', 'available', '2018-02-16', '2018-02-16', 1),
(45, 7, 'Childrens Books', 'available', '2018-02-16', '2018-02-16', 1),
(46, 7, 'Textbooks', 'available', '2018-02-16', '2018-02-16', 1),
(47, 7, 'Used Books', 'available', '2018-02-16', '2018-02-16', 1),
(48, 7, 'Kindle E-books', 'available', '2018-02-16', '2018-02-16', 1),
(49, 8, 'Cricket', 'available', '2018-02-16', '2018-02-16', 1),
(50, 8, 'Fitness Accessories', 'available', '2018-02-16', '2018-02-16', 1),
(51, 8, 'Camping & Hiking', 'available', '2018-02-16', '2018-02-16', 1),
(52, 8, 'Strength Training', 'available', '2018-02-16', '2018-02-16', 1),
(53, 8, 'Backpacks', 'available', '2018-02-16', '2018-02-16', 1),
(54, 8, 'Cardio Equipment', 'available', '2018-02-16', '2018-02-16', 1),
(55, 5, 'Televisions', 'available', '2018-02-16', '2018-02-16', 1),
(56, 5, 'Cameras', 'available', '2018-02-16', '2018-02-16', 1),
(57, 5, 'Audio & Video', 'available', '2018-02-16', '2018-02-16', 1),
(58, 5, 'Others', 'available', '2018-02-16', '2018-02-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribe`
--

CREATE TABLE `tblsubscribe` (
  `id` int(11) NOT NULL,
  `subemail` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `createdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubscribe`
--

INSERT INTO `tblsubscribe` (`id`, `subemail`, `status`, `createdate`) VALUES
(1, 'manansood60@gmail.com', 'Unsubscribed', '2018-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbltestimonial`
--

CREATE TABLE `tbltestimonial` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `review` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `adddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltestimonial`
--

INSERT INTO `tbltestimonial` (`id`, `name`, `occupation`, `review`, `image`, `adddate`) VALUES
(0, 'Manan Kumar', 'Web Developer', 'This is a place where you will get anything you want at a very reasonable price.', '1519386300-1446IMG-20180211-WA0020-min.jpg', '2018-02-23'),
(0, 'Ramanpreet Singh', 'Web Developer', 'Lorem khaled ipsum is a major key to success. Itâ€™s on you how you want to live your life. Everyone has a choice.', '1519387585-22831516431197-126raman.jpg', '2018-02-23'),
(0, 'Durgalal Gupta', 'Web Developer', 'Lorem khaled ipsum is a major key to success. Itâ€™s on you how you want to live your life. Everyone has a choice.', '1519387611-92591516434317-449durga.jpg', '2018-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `userfname` varchar(255) NOT NULL,
  `userlname` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `useraddress` text NOT NULL,
  `userphone` varchar(255) NOT NULL,
  `usercreatedate` date NOT NULL,
  `usergender` varchar(50) NOT NULL,
  `userpincode` int(11) NOT NULL,
  `usercity` varchar(255) NOT NULL,
  `userstate` varchar(255) NOT NULL,
  `userlandmark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `userfname`, `userlname`, `useremail`, `userpassword`, `useraddress`, `userphone`, `usercreatedate`, `usergender`, `userpincode`, `usercity`, `userstate`, `userlandmark`) VALUES
(1, 'Manan', 'Kumar', 'manansood60@gmail.com', 'admin', '#2497/11, ST. No. 1, Vishkarma town', '+91 73555-88893', '2018-02-02', 'Male', 141003, 'Ludhiana', 'Punjab', 'Opposite Sharma Bakery'),
(7, 'Ramapreet', 'Singh', 'rspreet@gmail.com', 'admin', '#2305, st no. 5, gautam colony', '9888552268', '2018-02-03', 'Male', 141001, 'Ludhiana', 'Punjab', 'PVR Cinema');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbanner`
--
ALTER TABLE `tblbanner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactenquiry`
--
ALTER TABLE `tblcontactenquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblevent`
--
ALTER TABLE `tblevent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsizechart`
--
ALTER TABLE `tblsizechart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubscribe`
--
ALTER TABLE `tblsubscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `useremail` (`useremail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblbanner`
--
ALTER TABLE `tblbanner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblcontactenquiry`
--
ALTER TABLE `tblcontactenquiry`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblevent`
--
ALTER TABLE `tblevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tblsizechart`
--
ALTER TABLE `tblsizechart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `tblsubscribe`
--
ALTER TABLE `tblsubscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
