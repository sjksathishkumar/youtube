ALTER TABLE `homeSlider` ADD `subheaderImage` VARCHAR( 255 ) NOT NULL AFTER `content` ,
ADD `subheaderHeading` VARCHAR( 255 ) NOT NULL AFTER `subheaderImage` ,
ADD `subheaderContent` TEXT NOT NULL AFTER `subheaderHeading` 
ALTER TABLE  `product` CHANGE  `discount_price`  `discount_price` FLOAT( 10, 2 ) NOT NULL DEFAULT  '0'
--
-- Table structure for table `Discount`
--This s done by Priyanka Date 02-04-2015 final discount table

CREATE TABLE IF NOT EXISTS `Discount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CouponName` varchar(255) NOT NULL,
  `CouponCode` varchar(255) NOT NULL,
  `Discount` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `CouponStatus` enum('0','1') NOT NULL COMMENT '0=> Inactive, 1=> Active',
  `CouponAddedDate` date NOT NULL,
  `CouponUpdatedDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `Discount`
--

INSERT INTO `Discount` (`id`, `CouponName`, `CouponCode`, `Discount`, `StartDate`, `EndDate`, `CouponStatus`, `CouponAddedDate`, `CouponUpdatedDate`) VALUES
(7, 'pruini', '23434dft', 12, '2015-11-30', '2015-11-30', '1', '2015-03-30', '2015-04-02'),
(9, 'testdate1', 'qwert', 11, '2015-03-01', '2015-04-05', '1', '2015-03-30', '2015-03-30'),
(10, 'testdic1', 'wert', 12, '2015-03-25', '2015-03-31', '0', '2015-03-30', '2015-03-30'),
(11, 'test21', 'rety', 11, '2015-04-06', '2015-04-09', '0', '2015-04-01', '2015-04-01'),
(12, 'rtettry', 'fgdfhgfj', 11, '2015-04-01', '2015-04-15', '1', '2015-04-01', '2015-04-01'),
(13, 'final', 'qwas', 23, '2015-04-21', '2015-04-29', '0', '2015-04-01', '2015-04-01'),
(14, 'april', 'kjhg', 67, '2015-04-08', '2015-04-13', '1', '2015-04-02', '2015-04-02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
--
-- Table structure for table `Payment`
-- This s done by Priyanka Date 02-04-2015 final payment table

CREATE TABLE IF NOT EXISTS `Payment` (
  `pkPaymentID` int(11) NOT NULL AUTO_INCREMENT,
  `fkUserID` int(11) NOT NULL,
  `fkOrderID` int(11) NOT NULL,
  `fkInvoiceID` int(11) NOT NULL,
  `PaymentTransactionID` varchar(225) NOT NULL,
  `PaymentMode` enum('1','2','3') NOT NULL COMMENT '1=> Credit Card, 2=>Debit Card,3=>Paypal',
  `PaymentDate` date NOT NULL,
  `PaymentStatus` enum('1','2','3','4') NOT NULL COMMENT '4 => Cancelled,3 => Completed,2=>Posted,1 => Pending',
  `PaymentDateAdded` datetime NOT NULL,
  PRIMARY KEY (`pkPaymentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Payment`
--

INSERT INTO `Payment` (`pkPaymentID`, `fkUserID`, `fkOrderID`, `fkInvoiceID`, `PaymentTransactionID`, `PaymentMode`, `PaymentDate`, `PaymentStatus`, `PaymentDateAdded`) VALUES
(1, 91, 7, 1, '1111', '2', '2015-04-01', '2', '2015-04-02 00:00:00'),
(2, 109, 12, 2, '2222', '3', '2015-03-26', '1', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Table structure for table `Invoice`
-- This s done by Priyanka Date 02-04-2015 final invoice table

CREATE TABLE IF NOT EXISTS `Invoice` (
  `pkInvoiceID` int(11) NOT NULL,
  `fkOrderID` int(11) NOT NULL,
  `InvoiceDate` date NOT NULL,
  `InvoiceDetail` blob NOT NULL,
  `InvoiceFileName` varchar(225) NOT NULL,
  `fkCustomerID` int(11) NOT NULL,
  `InvoiveAddedDate` date NOT NULL,
  `InvoiceUpdatedDate` date NOT NULL,
  PRIMARY KEY (`pkInvoiceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Invoice`
--

INSERT INTO `Invoice` (`pkInvoiceID`, `fkOrderID`, `InvoiceDate`, `InvoiceDetail`, `InvoiceFileName`, `fkCustomerID`, `InvoiveAddedDate`, `InvoiceUpdatedDate`) VALUES
(1, 12, '2015-03-04', '', '', 91, '2015-03-13', '2015-03-30'),
(2, 7, '2015-04-01', 0x696e766f696365, '', 110, '2015-04-01', '2015-04-02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Table structure for table `contactRequest`
--
--This is added by Hemant jhalani date 2-04-2015

CREATE TABLE IF NOT EXISTS `contactRequest` (
  `pkcontactID` int(11) NOT NULL AUTO_INCREMENT,
  `contactName` varchar(255) NOT NULL,
  `contactEmail` varchar(255) NOT NULL,
  `contactSubject` varchar(255) NOT NULL,
  `contactBody` text NOT NULL,
  `contactCreatedDate` datetime NOT NULL,
  `contactUpdatedDate` datetime NOT NULL,
  PRIMARY KEY (`pkcontactID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


--
-- Table structure for table `Invoice`
--This s done by Priyanka Date 01-04-2015

CREATE TABLE IF NOT EXISTS `Invoice` (
  `InvoiceID` int(11) NOT NULL,
  `fkOrderID` int(11) NOT NULL,
  `InvoiceDate` date NOT NULL,
  `InvoiceDetail` mediumtext NOT NULL,
  `FileName` varchar(225) NOT NULL,
  `fkCustomerID` int(11) NOT NULL,
  `InvoiveAddedDate` date NOT NULL,
  `InvoiceUpdatedDate` date NOT NULL,
  PRIMARY KEY (`InvoiceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Invoice`
--

INSERT INTO `Invoice` (`InvoiceID`, `fkOrderID`, `InvoiceDate`, `InvoiceDetail`, `FileName`, `fkCustomerID`, `InvoiveAddedDate`, `InvoiceUpdatedDate`) VALUES
(1, 19, '2015-03-04', '', '', 91, '2015-03-13', '2015-03-30'),
(2, 12, '2015-03-18', '', '', 109, '2015-03-20', '2015-03-30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



--
-- Table structure for table `Payment`

-- This s done by Priyanka Date 01-04-2015

CREATE TABLE IF NOT EXISTS `Payment` (
  `pkPaymentID` int(11) NOT NULL AUTO_INCREMENT,
  `fkUserID` int(11) NOT NULL,
  `fkOrderID` int(11) NOT NULL,
  `fkInvoiceID` int(11) NOT NULL,
  `TransactionID` varchar(225) NOT NULL,
  `PaymentMode` enum('1','2','3') NOT NULL COMMENT '1=> Credit Card, 2=>Debit Card,3=>Paypal',
  `PaymentDate` date NOT NULL,
  `PaymentStatus` enum('1','2','3','4') NOT NULL COMMENT '4 => Cancelled,3 => Completed,2=>Posted,1 => Pending',
  `PaymentDateAdded` datetime NOT NULL,
  PRIMARY KEY (`pkPaymentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Payment`
--

INSERT INTO `Payment` (`pkPaymentID`, `fkUserID`, `fkOrderID`, `fkInvoiceID`, `TransactionID`, `PaymentMode`, `PaymentDate`, `PaymentStatus`, `PaymentDateAdded`) VALUES
(1, 91, 7, 1, '1111', '1', '2015-04-01', '1', '2015-04-01 00:00:00'),
(2, 109, 12, 2, '2222', '3', '2015-03-26', '1', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




--
-- Table structure for table `Discount`
--This s done by Priyanka Date 01-04-2015

CREATE TABLE IF NOT EXISTS `Discount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CouponName` varchar(255) NOT NULL,
  `CouponCode` varchar(255) NOT NULL,
  `Discount` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `CouponAddedDate` date NOT NULL,
  `CouponUpdatedDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `Discount`
--

INSERT INTO `Discount` (`id`, `CouponName`, `CouponCode`, `Discount`, `StartDate`, `EndDate`, `CouponAddedDate`, `CouponUpdatedDate`) VALUES
(7, 'pruini', '23434dft', 12, '0000-00-00', '0000-00-00', '2015-03-30', '2015-03-30'),
(9, 'testdate1', 'qwert', 11, '2015-03-01', '2015-04-05', '2015-03-30', '2015-03-30'),
(10, 'testdic1', 'wert', 12, '2015-03-25', '2015-03-31', '2015-03-30', '2015-03-30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
--
-- Table structure for table `combo`
--This s done by Priyanka Date 25-03-2015

CREATE TABLE IF NOT EXISTS `combo` (
  `pkComboID` int(11) NOT NULL AUTO_INCREMENT,
  `ComboName` varchar(255) NOT NULL,
  `fkCategoryID` enum('0','1') NOT NULL COMMENT '''0''=>''Weekly'', ''1'' =>''Monthly''',
  `ComboPrice` float(10,2) NOT NULL,
  `ComboImage` varchar(255) NOT NULL,
  `ComboStatus` enum('0','1') NOT NULL COMMENT '0=>Inactive, 1=>Active',
  `ComboAddedDate` datetime NOT NULL,
  `ComboModifiedDate` datetime NOT NULL,
  `ComboDetails` longtext NOT NULL,
  PRIMARY KEY (`pkComboID`),
  UNIQUE KEY `ComboName` (`ComboName`),
  KEY `fkcategory_id` (`fkCategoryID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `combo`
--

INSERT INTO `combo` (`pkComboID`, `ComboName`, `fkCategoryID`, `ComboPrice`, `ComboImage`, `ComboStatus`, `ComboAddedDate`, `ComboModifiedDate`, `ComboDetails`) VALUES
(32, 'jerry', '0', 0.00, '1425880532_abt_girl.png', '0', '2015-03-24 17:53:43', '2015-03-24 17:53:43', '<p>hello hgjgh tryhtry</p>');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
--
-- Table structure for table `order_details`
--This is Done by Priyanka Date-23-03-2015

CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fkorder_id` int(11) NOT NULL,
  `fkuser_id` int(11) NOT NULL,
  `fkproduct_id` int(11) NOT NULL,
  `fkcombo_id` int(11) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subTotal` float(10,2) NOT NULL,
  `discount` double NOT NULL,
  `grandTotal` float(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkorder_id` (`fkorder_id`,`fkuser_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `fkorder_id`, `fkuser_id`, `fkproduct_id`, `fkcombo_id`, `amount`, `quantity`, `subTotal`, `discount`, `grandTotal`) VALUES
(1, 1, 11, 2, 3, 56.00, 0, 0.00, 0, 0.00);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
--
-- Table structure for table `orders`
--	
--This is added by Priyanka date 23-03-2015

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `fkuser_id` int(11) NOT NULL,
  `billing_firstname` varchar(200) NOT NULL,
  `billing_lastname` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `shipping_address1` varchar(200) NOT NULL,
  `shipping_address2` varchar(200) NOT NULL,
  `shipping_suburb` varchar(200) NOT NULL,
  `shipping_city` varchar(200) NOT NULL,
  `shipping_postcode` varchar(200) NOT NULL,
  `contactno` varchar(100) NOT NULL,
  `ordering_date` datetime NOT NULL,
  `ordering_done` enum('0','1') NOT NULL COMMENT '0=>Inactive,1=>Active',
  `ordering_confirmed` enum('0','1') NOT NULL COMMENT '0=>No,1=>yes',
  `payment_method` varchar(100) NOT NULL,
  `fkship_id` int(11) NOT NULL,
  `status` enum('1','2','3','4') NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `fkuser_id` (`fkuser_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `fkuser_id`, `billing_firstname`, `billing_lastname`, `email`, `shipping_address1`, `shipping_address2`, `shipping_suburb`, `shipping_city`, `shipping_postcode`, `contactno`, `ordering_date`, `ordering_done`, `ordering_confirmed`, `payment_method`, `fkship_id`, `status`) VALUES
(1, 55, 'first name', 'last name', 'email@mail.com', 'add1', 'add2', 'suburb', 'city', '11111', '9876543243', '2015-03-11 15:36:25', '', '', '', 1, '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



-- This is added by Deepak on date 19-Mar-2015
ALTER TABLE `combo` ADD `ComboName` VARCHAR( 255 ) NOT NULL AFTER `pkComboID`;
ALTER TABLE `combo` ADD UNIQUE (`ComboName`);
ALTER TABLE `combo` CHANGE `ComboImage` `ComboImage` VARCHAR( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ;
ALTER TABLE `combo_item_relation` ADD `ComboItemName` VARCHAR( 150 ) NOT NULL AFTER `pkComboItemRelationID` ;
ALTER TABLE `combo_item_relation` ADD UNIQUE (`ComboItemName`);
ALTER TABLE `combo_item_relation` CHANGE `ItemDesc` `ItemDesc` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ;
INSERT INTO `combo_categories` (`pkComboCategoryID`, `ComboCategoryName`, `ComboCategoryDateAdded`, `ComboCategoryDateModified`) VALUES
(1, 'Monthly Combo', '2015-03-19 12:21:11', '2015-03-19 12:21:13'),
(2, 'Weekly Combo', '2015-03-19 12:21:49', '2015-03-19 12:21:53');

-- This is added by Deepak on date 18-Mar-2015
CREATE TABLE `combo_categories` (
`pkComboCategoryID` INT NOT NULL AUTO_INCREMENT ,
`ComboCategoryName` VARCHAR( 255 ),
`ComboCategoryDateAdded` DATETIME NOT NULL ,
`ComboCategoryDateModified` DATETIME NOT NULL ,
PRIMARY KEY ( `pkComboCategoryID` )
) ENGINE = MYISAM ;

CREATE TABLE `combo_items` (
`pkComboItemID` INT NOT NULL AUTO_INCREMENT ,
`ComboItemName` VARCHAR( 100 ) NOT NULL ,
`ComboItemDateAdded` DATETIME NOT NULL ,
`ComboItemDateModified` DATETIME NOT NULL ,
PRIMARY KEY ( `pkComboItemID` )
) ENGINE = MYISAM ;

CREATE TABLE `combo_item_relation` (
`pkComboItemRelationID` INT NOT NULL AUTO_INCREMENT ,
`fkComboID` INT NOT NULL ,
`ItemQty` INT NOT NULL ,
`ItemDesc` VARCHAR( 255 ) NOT NULL ,
`ComboItemDateAdded` DATETIME NOT NULL ,
`ComboItemDateModified` DATETIME NOT NULL ,
PRIMARY KEY ( `pkComboItemRelationID` )
) ENGINE = MYISAM ;

DROP TABLE `combo` ;

CREATE TABLE IF NOT EXISTS `combo` (
  `pkComboID` int(11) NOT NULL AUTO_INCREMENT,
  `fkCategoryID` int(11) NOT NULL,
  `ComboPrice` float(10,2) NOT NULL,
  `ComboImage` text NOT NULL,
  `ComboStatus` enum('0','1') NOT NULL COMMENT '0=>Inactive, 1=>Active',
  `ComboAddedDate` datetime NOT NULL,
  `ComboModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`pkComboID`),
  KEY `fkcategory_id` (`fkCategoryID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

