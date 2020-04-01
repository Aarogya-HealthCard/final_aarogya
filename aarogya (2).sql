-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2020 at 07:15 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aarogya`
--

-- --------------------------------------------------------

--
-- Table structure for table `clinic_info`
--

CREATE TABLE `clinic_info` (
  `doc_id` int(11) NOT NULL,
  `enq_no` varchar(10) DEFAULT NULL,
  `clinic_name` varchar(30) DEFAULT NULL,
  `str_addr` text,
  `area` varchar(30) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `zip` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinic_info`
--

INSERT INTO `clinic_info` (`doc_id`, `enq_no`, `clinic_name`, `str_addr`, `area`, `city`, `zip`) VALUES
(10, '9099520770', 'Harmony Cardiology Clinic', '2nd Floor, Sardar Nagar Main Road, Astron Chawk.', 'New Jagnath Plot', 'Rajkot', '360001'),
(12, '236489', 'Sterling Hospitals', 'Nr. Raiya Chowk', 'Raiya Chowk', 'Rajkot', '360005'),
(22, '236489', 'Bless Multispeciality Clinic', 'Navjyot Park, 150 Feet Ring Road, Giriraj Hospital Street, Kalavad Road., Landmark: Near Giriraj Hospital., Rajkot', 'Kalawad Road', 'Rajkot', '360005'),
(23, '79395 9322', 'Tejas Fertility Clinic', '#1, Ghanshyam Bhuvam., Landmark: Near Jayraj Plot, Rajkot', 'Millpara', 'Rajkot', '360007'),
(24, '8039345042', 'Avan Hospital', 'Jetpur Road,Opp.Gondal Sahkari Juth Mandali', 'Gondal Road', 'Rajkot', '360002'),
(25, '7930061908', 'Sinus Hospital', 'Unit of Anish Hospital, Dr. Radhakrishnan Marg, Opp Swami Vivekananda Statue, Nr. Kathiawar Gymkhana', 'New Jagnath Plot', 'Rajkot', '360001'),
(26, '0281-66944', 'Wockhardt Hospitals', 'Nr. St.Mary School', 'Kalawad Road', 'Rajkot', '360005');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `d_id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `report` text NOT NULL,
  `medicines` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`d_id`, `name`, `report`, `medicines`) VALUES
(1, 'Asthma/Copd', 'Lung (pulmonary) function tests,Chest X-ray,Arterial blood gas analysis', 'aclidinium,arformoterol'),
(5, 'Blood Clot', 'Fragment D-dimer test\r\n                                   ', 'Apixaban,Betrixaban'),
(6, 'Diabetes', 'A1C test', 'Sulfonylureas,Thiazolidinediones'),
(7, 'Dry Eye', 'Schirmer''s Test', 'Restasis drops'),
(8, 'Glaucoma', 'Tonometry,Ophthalmoscopy', 'prostaglandin analogs, beta blockers, alpha agonists'),
(9, 'Gout', 'Synovial fluid analysis ,Uric acid,Complete blood count (CBC)', 'Allopurinol,Colchicine,Febuxostat'),
(10, 'Haematopoiesis', 'LDL levels,HDL levels', 'none'),
(11, 'diarrhoea', 'Blood test,Stool test', 'loperamide'),
(12, 'Ear Conditions', 'Benign paroxysmal positional vertigo (BPPV)', 'Debrox,Auraphene-B'),
(13, 'Fungal', 'Blood Culture Test,Skin Rashes and Other Problems', 'clotrimazole,econazole'),
(14, 'Swine flu', ' (H1N1) Test', 'oseltamivir'),
(15, 'Alzheimer', 'Vitamin B12,T4,Electrolytes,CRP, ESR', 'galantamine'),
(16, 'Bleeding Disorders', 'bleeding time (BT),activated partial thromboplastin time (aPTT),prothrombin time (PT), and thrombin time (TT)', 'Cyklokapron');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doc_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `live` tinyint(4) NOT NULL DEFAULT '0',
  `hash` varchar(32) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `vkey` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doc_id`, `firstname`, `lastname`, `email`, `phone`, `password`, `live`, `hash`, `active`, `vkey`) VALUES
(10, 'Darsh', 'Ambaliya', 'darshambalia@yahoo.in', '9099520770', 'abc', 1, '705f2172834666788607efbfca35afb3', 0, NULL),
(12, 'Renish', 'Charaniya', 'ren@g.c', '1234567890', '$2y$10$IEG.G65/6hVBeqZZKdNmkO6EP9AHoMSD3vbZfKHcv1hAUfOaoD9o6', 1, '41ae36ecb9b3eee609d05b90c14222fb', 0, NULL),
(22, 'Preeti', 'Odedra', 'odedra@gmail.com', '9654713648', '$2y$10$FvS/P3t7t6kTEGVMcVbSgOtp8aLlSwffd8Uoofq1I1QIkaORE7cMy', 1, '149e9677a5989fd342ae44213df68868', 0, NULL),
(23, 'Rajesh', 'Gorasia', 'gorasia@gmail.com', '8634512754', '$2y$10$kIf40l0OBV0z.qx3P6S3TeV7LsqwLNxl3MPI2Zn.DHxNpSpM.aFFS', 1, '3df1d4b96d8976ff5986393e8767f5b2', 0, NULL),
(24, 'Vimal', 'Rachchh', 'rachchh@gmail.com', '8039345042', '$2y$10$kQlJrLItI3L.9lBJh7KfPOcRy5V56d/ugkExJbySGKP2/a2N5qaHK', 1, 'd82c8d1619ad8176d665453cfb2e55f0', 0, NULL),
(25, 'Umang', 'Shukla', 'shukla@gmail.com', '7930061908', '$2y$10$GZ9ur2Z6Sf2KgEWQqLuAOujz4Cpa5GXLzlFGTtTFMgHAa2lpxLwdC', 1, '7c590f01490190db0ed02a5070e20f01', 0, NULL),
(26, 'Praful', 'Kamani', 'kamani@gmail.com', '9843265715', 'abc123', 1, 'c5ff2543b53f4cc0ad3819a36752467b', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doc_info`
--

CREATE TABLE `doc_info` (
  `doc_id` int(11) NOT NULL,
  `propic` text,
  `speciality` varchar(30) DEFAULT NULL,
  `qualification` text,
  `institute` varchar(50) DEFAULT NULL,
  `exp` varchar(3) DEFAULT NULL,
  `reg_no` varchar(15) DEFAULT NULL,
  `aadhar` varchar(15) DEFAULT NULL,
  `certificate` text,
  `about` text,
  `upvotes` int(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_info`
--

INSERT INTO `doc_info` (`doc_id`, `propic`, `speciality`, `qualification`, `institute`, `exp`, `reg_no`, `aadhar`, `certificate`, `about`, `upvotes`) VALUES
(10, 'PicsArt_05-11-11.36.24.jpg', 'Cardiologist', 'MBBS, MD - Cardiology, Diploma in Cardiology', 'MBBS - Medical College, Baroda', '6', '156030307002', '7456381274', 'footer.jpg', 'Dr. Darsh Ambaliya is a Cardiologist in Rajkot New Jagnath Plot, Rajkot and has an experience of 6 years in this field. Dr. Darsh Ambaliya practices at Cure Cardiology Clinic in Rajkot New Jagnath Plot, Rajkot. He completed MBBS from Medical College, Baroda in 2007,MD - Cardiology from Asian Heart Institute, Mumbai in 2011 and Diploma in Cardiology from Asian Heart Institute, Mumbai in 2013. 							', 110),
(12, 'renish.png', 'Cardiologist', 'MBBS, MD - Cardiology', 'B. J. Medical College', '3', '15535743694', '5733278528', 'footer.jpg', '									I am renish charaniya, A.H.Barhoush M.D. has been serving the Glades community for over 35 years. Dr. A.H. Barhoush completed his medical degree from Cairo University in Egypt in 1966 and his training in Obstetrics and Gynecology in New York and New Jersey from 1970 to 1973 at St. Clares Hospital, Albert Einstein College of Medicine and Jersey Medical School. He also completed training in GYN Oncology in 1974 at Margaret Hague Hospital in New Jersey. Dr. Barhoush has been certified by the American Board of Obstetrics and Gynecology since 1974. Currently Dr. Barhoush is a Clinical Assistant Professor at the Department of Obstetric & Gynecology at Nova Southeastern University. He is also a member of ACOG and International college of Surgeons.																					', 51),
(22, 'doctor_listing_2.jpg', 'Dentist', 'BDS, Dental Surgeon', 'BDS - V.S. Dental College, Ban', '12', '156141', '753642158964', 'footer.jpg', 'Dr Preeti G Odedra is an renowned dentist and had taken advance training in microscopic dentistry, implants, lasers & cosmetic dentistry. Dr Preeti G Odedra practices at bless multispeciality clinic at, Rajkot. Bless multispeciality clinic is known for its specialty services.																	', 95),
(23, 'doctor_listing_4.jpg', 'Gynecologist', 'MBBS, MD - Obstetrics & Gynaecology', 'MBBS - MP Shah Medical College', '33', 'G-10605', '863478912345', 'footer.jpg', 'Dr. Rajesh P Gorasia is a Gynecologist,Obstetrician and Infertility Specialist in Rajkot Millpara, Rajkot and has an experience of 33 years in these fields. Dr. Rajesh P Gorasia practices at Tejas Fertility Clinic in Rajkot Millpara, Rajkot. He completed MBBS from MP Shah Medical College,Jamnagar in 1979 and MD - Obstetrics & Gynaecology from MP Shah Medical College,Jamnagar in 1982.\r\nHe is a member of Indian Society for Assisted Reproduction (ISAR),European Society of Human Reproduction and Embryology (ESHRE),American Society of Reproductive Medicine,Federation of Obstetric and Gynaecological Societies of India (FOGSI),Indian Association of Gynaecological Endoscopist (IAGE) and IMS. Some of the services provided by the doctor are: Gynae Problems,In-Vitro Fertilization (IVF) and Infertility Evaluation / Treatment etc.																	', 252),
(24, 'doctor_listing_3.jpg', 'Homoeopathic', 'BHMS, Certificate in Child Health (CCH)', 'BHMS - Rajkot Homoeopath Medic', '9', 'G11349', '632451896374', 'footer.jpg', '																		Dr. Vimal S Rachchh is practicing homeopathy at Santosh clinic, from last nine years. He is always generous to treat his patients with best possible & Classical homeopathy way, along with modern touch of medical sciences.\r\nHe is very keen & interested in treatments of various kinds of lifestyle disorders and childhood diseases. He has solved successfully many skin conditions & allergic problems of the patients belonging to various age groups. He stands for providing exact homeopathic medicine to his patients and giving them quickest and gentle homeopathic care.\r\nHe is flourishing his homeopathic practice ethically and powerfully. He is in constant touch with modern era of homeopathy by attending various seminars C.M.E. & workshops. He is working in a way that patients forget homeopathy is a slow system.\r\nHis unique personality seems to heal in all ways of his patientâ€™s life. He is a friend philosopher and a guide to many of his patients. He publishes various articles, thesis, notes and health topics in different health journals and magazines.\r\nHe provides free services to needy people in different areas to make availability of homeopathy to all class of people. Besides this he is visits homeopathy medical college, to share his knowledge and make awareness about, homeopathy and his practice to students.\r\nHe always believes to treat his patients in rational quick and gentle way, and he is always ready to listen to his patients.																																	', 53),
(25, 'doctor_listing_5.jpg', 'Otolaryngologis', 'MBBS, MS - ENT, Endoscopic Sinus & Skull Based Surgery, Microscopic Ear Surgery', 'MBBS, MS - ENT, Endoscopic Sin', '16', 'G14988', '756314598632', 'footer.jpg', 'http://www.sinushospital.com Dr. Umang shukla is one of the well trained and experienced ENT surgeons in Rajkot. He is chief consultant and director of sinus hospital Rajkot. Dr. Umang has advanced specialisation in endoscopic sinus surgery and microscopic ear surgery. He is honorary attached with very reputed corporate hospitals and also charity hospitals for poor and needy patient.																	', 20),
(26, 'kamani.jpg', 'Gastroenterologist', 'M.D. DNB (Gasteroenterology)', '2002, M.D. (Medicine) Pramukh Swami Medi. College ', '8', 'G11367', '943214786354', 'footer.jpg', 'Dr. Praful Kamani did his MBBS & MD (Medicine) from Pramukh Swami Medical Collage, Karamsad (Gujarat). He passed out his DNB in Gastroentrology from Jagjivan Ram Hospital, Mumbai.\r\n\r\nDr. Praful Kamani has a vast experience in upper & lower Gastro-Intestinal endoscopy as well as therapeutic endoscopy like ERCP, Band ligation, Polypectomy and metal stenting of esophagus & biliary tree as well as dif?cult foreign body removal. He also has a special interest in hepatology and he has attended various liver Conferences at America (AASLD)																	', 320);

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE `laboratory` (
  `lab_doc_id` int(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `firstname` varchar(10) DEFAULT NULL,
  `lastname` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`lab_doc_id`, `password`, `phone`, `email`, `firstname`, `lastname`) VALUES
(123, '123', '1231231231', 'fshf', 'Kishan', 'Sheth');

-- --------------------------------------------------------

--
-- Table structure for table `lab_doc_info`
--

CREATE TABLE `lab_doc_info` (
  `lab_doc_id` int(10) NOT NULL,
  `propic` text NOT NULL,
  `speciality` varchar(30) NOT NULL,
  `qualification` text NOT NULL,
  `institute` varchar(50) NOT NULL,
  `exp` varchar(3) NOT NULL,
  `reg_no` varchar(15) NOT NULL,
  `aadhar` varchar(15) NOT NULL,
  `certificate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lab_info`
--

CREATE TABLE `lab_info` (
  `lab_doc_id` int(10) NOT NULL,
  `enq_no` varchar(10) NOT NULL,
  `clinic_name` varchar(30) NOT NULL,
  `str_addr` text NOT NULL,
  `area` varchar(30) NOT NULL,
  `city` varchar(15) NOT NULL,
  `zip` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_info`
--

INSERT INTO `lab_info` (`lab_doc_id`, `enq_no`, `clinic_name`, `str_addr`, `area`, `city`, `zip`) VALUES
(0, 'enqno', 'clinic_name', 'str_addr', 'area', 'city', 'zipcod');

-- --------------------------------------------------------

--
-- Table structure for table `lab_test`
--

CREATE TABLE `lab_test` (
  `u_case_id` int(10) DEFAULT NULL,
  `test_id` int(10) NOT NULL,
  `t_name` varchar(15) DEFAULT NULL,
  `t_notes` varchar(100) DEFAULT NULL,
  `t_img` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_test`
--

INSERT INTO `lab_test` (`u_case_id`, `test_id`, `t_name`, `t_notes`, `t_img`, `status`) VALUES
(82, 13, 'Blood Test', 'Heomoglobin-14', 'vlcsnap-2018-08-30-20h53m58s91.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `u_case_id` int(10) DEFAULT NULL,
  `ph_id` int(10) NOT NULL,
  `m_status` int(2) DEFAULT NULL,
  `p_medicine` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`u_case_id`, `ph_id`, `m_status`, `p_medicine`) VALUES
(81, 24, NULL, 'medications'),
(82, 25, 1, 'Paracetamol 2x'),
(82, 26, 1, ' Dolo 500 5 tablets'),
(85, 27, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `pharm_info`
--

CREATE TABLE `pharm_info` (
  `ph_id` varchar(20) NOT NULL,
  `exp` varchar(5) NOT NULL,
  `propic` text NOT NULL,
  `aadhar` varchar(20) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `certificate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharm_info`
--

INSERT INTO `pharm_info` (`ph_id`, `exp`, `propic`, `aadhar`, `reg_no`, `certificate`) VALUES
('', '8', 'Ym93TjW.png', '88956', '74532255222', 'ho38QcM.png');

-- --------------------------------------------------------

--
-- Table structure for table `pharm_reg`
--

CREATE TABLE `pharm_reg` (
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `ph_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharm_reg`
--

INSERT INTO `pharm_reg` (`firstname`, `lastname`, `email`, `password`, `phone`, `ph_id`) VALUES
('Gaurang', 'Ganatra', 'ab@gmail.com', 'abc', '4545454545', 1),
('abb', 'abb', 'ab1@gmail.com', 'abc', '253742255', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pharm_shop_info`
--

CREATE TABLE `pharm_shop_info` (
  `ph_id` varchar(20) NOT NULL,
  `enq_no` varchar(10) NOT NULL,
  `shop_name` varchar(30) NOT NULL,
  `area` varchar(30) NOT NULL,
  `city` varchar(15) NOT NULL,
  `str_addr` text NOT NULL,
  `zip` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharm_shop_info`
--

INSERT INTO `pharm_shop_info` (`ph_id`, `enq_no`, `shop_name`, `area`, `city`, `str_addr`, `zip`) VALUES
('', '5655852', 'abc', ' vcm', 'Rajkot', 'charusat', '360002');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `u_case_id` int(10) DEFAULT NULL,
  `pre_id` int(10) NOT NULL,
  `observations` text,
  `diagnosis` text,
  `investigation` text,
  `medications` text,
  `plan` text,
  `disease` text,
  `status` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`u_case_id`, `pre_id`, `observations`, `diagnosis`, `investigation`, `medications`, `plan`, `disease`, `status`) VALUES
(81, 22, 'observations', 'diagonosis', 'investigation', 'medications', 'treatment', 'Fever', 1),
(82, 23, 'observations', 'diagonosis', 'investigation', 'Paracetamol 2x, Dolo 500 5 tablets', 'blood report', 'Viral Fever', 1),
(85, 24, '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `u_allergy`
--

CREATE TABLE `u_allergy` (
  `u_id` int(10) DEFAULT NULL,
  `a_id` int(10) NOT NULL,
  `a_name` varchar(30) DEFAULT NULL,
  `a_notes` varchar(100) DEFAULT NULL,
  `a_severity` varchar(40) DEFAULT NULL,
  `a_current_status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `u_case`
--

CREATE TABLE `u_case` (
  `u_id` varchar(12) DEFAULT NULL,
  `u_case_id` int(10) NOT NULL,
  `place` varchar(20) DEFAULT NULL,
  `doc_id` int(10) DEFAULT NULL,
  `c_date` datetime DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Open'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `u_case`
--

INSERT INTO `u_case` (`u_id`, `u_case_id`, `place`, `doc_id`, `c_date`, `status`) VALUES
('720599171114', 81, 'Harmony', 10, '2020-02-28 04:33:09', 'Closed'),
('720599171114', 82, 'Harmony', 10, '2020-02-28 04:34:37', 'Closed'),
('720599171114', 85, 'Harmony', 26, '2020-02-28 06:42:30', 'Open'),
('720599171114', 86, 'Harmony', 26, '2020-02-28 07:09:46', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `u_gen_info`
--

CREATE TABLE `u_gen_info` (
  `u_id` varchar(12) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `middlename` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(8) DEFAULT NULL,
  `aadhar_no` varchar(12) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `b_group` varchar(3) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `city_town` varchar(20) DEFAULT NULL,
  `district` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `pin` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `u_gen_info`
--

INSERT INTO `u_gen_info` (`u_id`, `password`, `firstname`, `middlename`, `lastname`, `dob`, `gender`, `aadhar_no`, `email`, `b_group`, `phone`, `address`, `city_town`, `district`, `state`, `pin`) VALUES
('123', 'abc', 'abc', 'abc', 'abc', '2020-02-04', 'male', '11223255', 'abc@gmail.com', 'a+', '1234567891', 'jashjshj', 'sjch', 'dsjfkf', 'ncjb', '36222'),
('217363714583', 'abc123', 'Renish', NULL, 'Charaniya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('444210904052', 'abc123', 'Gaurang', NULL, 'Ganatra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('535501031574', 'abc123', 'Sakshi', 'Rajeshbhai', 'Kothadiya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('668872716333', '1234', 'Neel', 'Nilesh', 'Thacker', '1999-05-29', 'Male', '668872716333', 'neelthacker0@gmail.com', 'b+', '9033117009', 'Gurukul ward 10/a plot no. 198 tenament no. D Gandhidham(Kutch)', 'Gandhidham', 'Kutch', 'Gujarat', '370201'),
('720599171114', 'abc123', 'Darsh', 'Rajeshbhai', 'Ambaliya', '1999-10-24', 'Male', '720599171114', 'darshambaliya@gmail.com', 'O+', '9099520770', 'Harikrishna Kunj, Bapu ni wadi', 'Jetpur', 'Rajkot', 'Gujarat', '360370'),
('785380696295', 'abc123', 'Dhruvil', NULL, 'Raithatha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('843962781542', 'abc123', 'Vishwa', NULL, 'Gandhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('973281747452', 'abc123', 'Harshil', NULL, 'Kothari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `u_health_gen_info`
--

CREATE TABLE `u_health_gen_info` (
  `u_id` int(10) DEFAULT NULL,
  `blood_pre` varchar(10) DEFAULT NULL,
  `diabetes` varchar(10) DEFAULT NULL,
  `bmi` int(10) DEFAULT NULL,
  `differently_abled` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `u_immunization`
--

CREATE TABLE `u_immunization` (
  `u_id` int(10) DEFAULT NULL,
  `u_im_id` int(10) NOT NULL,
  `i_name` varchar(30) DEFAULT NULL,
  `i_takeon` date DEFAULT NULL,
  `i_notes` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `u_insu_info`
--

CREATE TABLE `u_insu_info` (
  `u_id` int(10) DEFAULT NULL,
  `insu_provider` varchar(30) DEFAULT NULL,
  `policy_no` int(20) DEFAULT NULL,
  `policy_name` varchar(30) DEFAULT NULL,
  `valid_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clinic_info`
--
ALTER TABLE `clinic_info`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doc_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `doc_info`
--
ALTER TABLE `doc_info`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `laboratory`
--
ALTER TABLE `laboratory`
  ADD PRIMARY KEY (`lab_doc_id`);

--
-- Indexes for table `lab_test`
--
ALTER TABLE `lab_test`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `u_case_id` (`u_case_id`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`ph_id`),
  ADD KEY `u_case_id` (`u_case_id`);

--
-- Indexes for table `pharm_reg`
--
ALTER TABLE `pharm_reg`
  ADD PRIMARY KEY (`ph_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`pre_id`),
  ADD KEY `u_case_id` (`u_case_id`);

--
-- Indexes for table `u_allergy`
--
ALTER TABLE `u_allergy`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `u_case`
--
ALTER TABLE `u_case`
  ADD PRIMARY KEY (`u_case_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `u_gen_info`
--
ALTER TABLE `u_gen_info`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `u_health_gen_info`
--
ALTER TABLE `u_health_gen_info`
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `u_immunization`
--
ALTER TABLE `u_immunization`
  ADD PRIMARY KEY (`u_im_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `u_insu_info`
--
ALTER TABLE `u_insu_info`
  ADD KEY `u_id` (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clinic_info`
--
ALTER TABLE `clinic_info`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `d_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `doc_info`
--
ALTER TABLE `doc_info`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `laboratory`
--
ALTER TABLE `laboratory`
  MODIFY `lab_doc_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `lab_test`
--
ALTER TABLE `lab_test`
  MODIFY `test_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `ph_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `pharm_reg`
--
ALTER TABLE `pharm_reg`
  MODIFY `ph_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `pre_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `u_case`
--
ALTER TABLE `u_case`
  MODIFY `u_case_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clinic_info`
--
ALTER TABLE `clinic_info`
  ADD CONSTRAINT `clinic_info_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `doctors` (`doc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doc_info`
--
ALTER TABLE `doc_info`
  ADD CONSTRAINT `doc_info_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `doctors` (`doc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`u_case_id`) REFERENCES `u_case` (`u_case_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
