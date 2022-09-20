CREATE TABLE state (
  state_id int(11) NOT NULL,
  country_id int(11) NOT NULL,
  state_name varchar(255) NOT NULL,
  state_code varchar(5) NOT NULL,
  zone varchar(100) NOT NULL,
  GST_code varchar(5) NOT NULL,
  union_territories tinyint(1) NOT NULL,
  sort_order int(11) NOT NULL,
  created_on datetime NOT NULL,
  updated_by datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  status tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE state
  ADD PRIMARY KEY (state_id);
ALTER TABLE state
  MODIFY state_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
INSERT INTO state (state_id, country_id, state_name, state_code, zone, GST_code, union_territories, sort_order, created_on, updated_by, status) VALUES
(1, 99, 'Andaman and Nicobar Islands', 'AN', 'Southern', '35', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 99, 'Andhra Pradesh', 'AP', 'Southern', '28,37', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 99, 'Assam', 'AS', 'North-Eastern', '18', 0, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 99, 'Bihar', 'BR', 'Eastern', '10', 0, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 99, 'Dadra and Nagar Haveli', 'DN', 'Western', '26', 1, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 99, 'Delhi', 'DL', 'Northern', '07', 1, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(7, 99, 'Gujarat', 'GJ', 'Western', '24', 0, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(8, 99, 'Haryana', 'HR', 'Northern', '06', 0, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(9, 99, 'Himachal Pradesh', 'HP', 'Northern', '02', 0, 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(10, 99, 'Jammu and Kashmir', 'JK', 'Northern', '01', 1, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(11, 99, 'Kerala', 'KL', 'Southern', '32', 0, 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(12, 99, 'Lakshadweep', 'LD', 'Southern', '31', 1, 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(13, 99, 'Madhya Pradesh', 'MP', 'Central', '23', 0, 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(14, 99, 'Maharashtra', 'MH', 'Western', '27', 0, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(15, 99, 'Manipur', 'MM', 'North-Eastern', '14', 0, 21, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(16, 99, 'Meghalaya', 'ML', 'North-Eastern', '17', 0, 22, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(17, 99, 'Karnataka', 'KA', 'Southern', '29', 0, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(18, 99, 'Nagaland', 'NL', 'North-Eastern', '13', 0, 24, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(19, 99, 'Odisha', 'OR', 'Eastern', '21', 0, 25, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(20, 99, 'Puducherry', 'PY', 'Southern', '34', 1, 26, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(21, 99, 'Punjab', 'PB', 'Northern', '03', 0, 27, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(22, 99, 'Rajasthan', 'RJ', 'Northern', '08', 0, 28, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(23, 99, 'Tamil Nadu', 'TN', 'Southern', '33', 0, 30, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(24, 99, 'Tripura', 'TR', 'North-Eastern', '16', 0, 31, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(25, 99, 'Uttar Pradesh', 'UP', 'Northern', '09', 0, 32, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(26, 99, 'West Bengal', 'WB', 'Eastern', '19', 0, 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(27, 99, 'Sikkim', 'SK', 'North-Eastern', '11', 0, 29, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(28, 99, 'Arunachal Pradesh', 'AR', 'North-Eastern', '12', 0, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(29, 99, 'Mizoram', 'MZ', 'North-Eastern', '15', 0, 23, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(30, 99, 'Daman and Diu', 'DD', 'Western', '25', 1, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(31, 99, 'Goa', 'GA', 'Western', '30', 0, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(32, 99, 'Uttarakhand', 'UL', 'Northern', '05', 0, 33, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(33, 99, 'Chhattisgarh', 'CT', 'Central', '22', 0, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(34, 99, 'Jharkhand', 'JH', 'Eastern', '20', 0, 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(35, 99, 'Telangana', 'TS', 'Southern', '36', 0, 35, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(36, 99, 'Chandigarh', 'CH', 'Northern', '04', 1, 36, '0000-00-00 00:00:00', '2020-05-15 13:36:24', 1),
(37, 99, 'Ladakh', 'LA', 'Northern', '38', 1, 37, '0000-00-00 00:00:00', '2020-05-15 14:51:51', 1);

CREATE TABLE city (
  city_id int(11) NOT NULL,
  state_id int(11) NOT NULL,
  city_name varchar(255) NOT NULL,
  sort_order int(11) NOT NULL DEFAULT '0',
  created_by int(11) NOT NULL DEFAULT '0',
  created_on datetime DEFAULT CURRENT_TIMESTAMP,
  updated_by int(11) NOT NULL DEFAULT '0',
  updated_on datetime DEFAULT NULL,
  is_active tinyint(4) NOT NULL DEFAULT '1',
  city_alias_name varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE city
  ADD PRIMARY KEY (city_id),
  ADD KEY is_active (is_active),
  ADD KEY state_id (state_id),
  ADD KEY city_name (city_name);

ALTER TABLE city
  MODIFY city_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58401;
CREATE TABLE department (
  department_id int(11) NOT NULL AUTO_INCREMENT,
  department varchar(100) NOT NULL,
  is_ho tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=NO, 1=Yes',
  is_active tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=NA, 1=ACTIVE,2 = DEACTIVE,3=DELETE',
  created_by int(11) NOT NULL,
  created_on datetime NOT NULL,
  updated_by int(11) DEFAULT NULL,
  updated_on datetime DEFAULT NULL,
  PRIMARY KEY (department_id)
) ENGINE=InnoDB;

CREATE TABLE role (
  role_id int(11) NOT NULL AUTO_INCREMENT,
  role varchar(100) NOT NULL,
  is_dev_op tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=NO, 1=Yes',
  is_active tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=NA, 1=ACTIVE,2 = DEACTIVE,3=DELETE',
  created_by int(11) NOT NULL,
  created_on datetime NOT NULL,
  updated_by int(11) DEFAULT NULL,
  updated_on datetime DEFAULT NULL,
  PRIMARY KEY (role_id)
) ENGINE=InnoDB;

CREATE TABLE user (
  user_id int(11) NOT NULL AUTO_INCREMENT,
  unique_no varchar(50) NOT NULL DEFAULT '',
  first_name varchar(50) NOT NULL,
  middel_name varchar(50) NOT NULL DEFAULT '',
  last_name varchar(50) NOT NULL DEFAULT '',
  display_name varchar(50) NOT NULL DEFAULT '',
  email_id varchar(100) NOT NULL,
  alt_email_id varchar(100) NOT NULL DEFAULT '',
  display_password varchar(100) NOT NULL,
  password varchar(450) NOT NULL,
  dob date NOT NULL,
  doj date NOT NULL,
  gender varchar(1) NOT NULL COMMENT 'm=MALE,f=FEMALE',
  contact_no varchar(15) NOT NULL,
  alt_contact_no varchar(15) NOT NULL DEFAULT '',
  address_line_1 varchar(100) NOT NULL DEFAULT '',
  address_line_2 varchar(100) NOT NULL DEFAULT '',
  city_id INT NOT NULL DEFAULT 0,
  state_id INT NOT NULL DEFAULT 0,
  pincode varchar(6) NOT NULL DEFAULT '',
  country_id INT NOT NULL DEFAULT 0,
  comment varchar(450) NOT NULL DEFAULT '',
  is_active tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=NA, 1=ACTIVE,2 = DEACTIVE,3=DELETE',
  created_by int(11) NOT NULL,
  created_on datetime NOT NULL,
  updated_by int(11) DEFAULT NULL,
  updated_on datetime DEFAULT NULL,
  PRIMARY KEY (user_id)
) ENGINE=InnoDB;

CREATE TABLE user_role (
  user_role_id int(11) NOT NULL AUTO_INCREMENT,
  user_id INT NOT NULL,
  role_id INT NOT NULL,
  is_active tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=NA, 1=ACTIVE,2 = DEACTIVE,3=DELETE',
  created_by int(11) NOT NULL,
  created_on datetime NOT NULL,
  updated_by int(11) DEFAULT NULL,
  updated_on datetime DEFAULT NULL,
  PRIMARY KEY (user_role_id)
) ENGINE=InnoDB;

CREATE TABLE user_department (
  user_department_id int(11) NOT NULL AUTO_INCREMENT,
  user_id INT NOT NULL,
  department_id INT NOT NULL,
  is_active tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=NA, 1=ACTIVE,2 = DEACTIVE,3=DELETE',
  created_by int(11) NOT NULL,
  created_on datetime NOT NULL,
  updated_by int(11) DEFAULT NULL,
  updated_on datetime DEFAULT NULL,
  PRIMARY KEY (user_department_id)
) ENGINE=InnoDB;

CREATE TABLE user_branch (
  user_branch_id int(11) NOT NULL AUTO_INCREMENT,
  user_id INT NOT NULL,
  branch_id INT NOT NULL,
  is_active tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=NA, 1=ACTIVE,2 = DEACTIVE,3=DELETE',
  created_by int(11) NOT NULL,
  created_on datetime NOT NULL,
  updated_by int(11) DEFAULT NULL,
  updated_on datetime DEFAULT NULL,
  PRIMARY KEY (user_branch_id)
) ENGINE=InnoDB;

CREATE TABLE user_student (
  user_student_id int(11) NOT NULL AUTO_INCREMENT,
  user_id INT NOT NULL,
  student_id INT NOT NULL,
  is_active tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=NA, 1=ACTIVE,2 = DEACTIVE,3=DELETE',
  created_by int(11) NOT NULL,
  created_on datetime NOT NULL,
  updated_by int(11) DEFAULT NULL,
  updated_on datetime DEFAULT NULL,
  PRIMARY KEY (user_student_id)
) ENGINE=InnoDB;

CREATE TABLE fee_structure_master (
	fee_structure_master_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	structure_name VARCHAR(100) NOT NULL,
	is_required TINYINT(1) NOT NULL DEFAULT 0,
	is_active TINYINT(1) NOT NULL DEFAULT 0,
	created_by INT(11) NOT NULL DEFAULT 0,
	created_on DATETIME NOT NULL,
	updated_by INT(11) NULL DEFAULT NULL,
	updated_on DATETIME NULL DEFAULT NULL
);