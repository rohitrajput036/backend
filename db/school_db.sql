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