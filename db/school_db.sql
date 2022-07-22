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
