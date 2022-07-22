<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function createImageFromBase64($Base64 = '', $Path = '', $ImageName = '') {
        if (empty($Base64)) {
            return true;
        }
        if (preg_match("/^data:image\/(?<extension>(?:png|gif|jpg|jpeg));base64,(?<image>.+)$/", $Base64, $matchings)) {
            $imageData = base64_decode($matchings['image']);
            $extension = $matchings['extension'];
            $filename = $Path . $ImageName . ".jpg";
            if (file_exists($filename)) {
                $destination = $Path . $ImageName . '-' . date('YmdHis') . ".jpg";
                copy($filename, $destination);
            }
            if (file_put_contents($filename, $imageData)) {
                return true;
            } else {
                throw new Exception("Error in image saving", REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }

    function createImageFromBase64WithouExt($Base64 = '', $Path = '', $ImageName = '', $URLDecode = true) {
        if (empty($Base64)) {
            return true;
        }
        if ($URLDecode) {
            $imageData = base64_decode(urldecode($Base64));
        } else {
            $imageData = base64_decode($Base64);
        }
        if (!is_dir($Path)) {
            mkdir($Path, 0755, true);
        }
        if (strpos($ImageName, '.jpg') !== false) {
            $ImageName = substr($ImageName, 0, (strlen($ImageName) - 4));
        } else if (strpos($ImageName, '.jpeg') !== false) {
            $ImageName = substr($ImageName, 0, (strlen($ImageName) - 5));
        } else if (strpos($ImageName, '.png') !== false) {
            $ImageName = substr($ImageName, 0, (strlen($ImageName) - 4));
        }
        $filename = $Path . $ImageName . ".jpg";
        if (file_exists($filename)) {
            $destination = $Path . $ImageName . '-' . date('YmdHis') . ".jpg";
            copy($filename, $destination);
        }

        if (file_put_contents($filename, $imageData)) {
            return true;
        } else {
            throw new Exception("Error in image saving", REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    function createExcelFromBase64($Base64 = '', $Path = '', $FileName = '') {
        if (empty($Base64)) {
            throw new Exception("Excel File missing", REST_Controller::HTTP_NOT_ACCEPTABLE);
        }

        $result = explode(';base64,', $Base64);
        if (isset($result[0]) && $result[1]) {
            $ext_data = explode('data:', $result[0]);
            if (isset($ext_data[1])) {
                $extension = mime2ext($ext_data[1]);
            } else {
                throw new Exception("Extension information missing", REST_Controller::HTTP_BAD_REQUEST);
            }
            $fileData = base64_decode($result[1]);
            $filename = $Path . $FileName . "." . $extension;
            if (file_exists($filename)) {
                $destination = $Path . $FileName . '-' . date('YmdHis') . "." . $extension;
                copy($filename, $destination);
            }
            if (file_put_contents($filename, $fileData)) {
                return $filename;
            } else {
                throw new Exception("Error in image saving", REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else {
            throw new Exception("Invalid Base64 Format", REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    function createPDFFromBase64($Base64 = '', $Path = '', $FileName = '') {
        if (empty($Base64)) {
            return true;
        }
        if (preg_match("/^data:application\/(?<extension>(?:pdf));base64,(?<image>.+)$/", $Base64, $matchings)) {
            $imageData = base64_decode($matchings['image']);
            $extension = $matchings['extension'];
            $filename = $Path . $FileName . ".pdf";
            if (file_exists($filename)) {
                $destination = $Path . $FileName . '-' . date('YmdHis') . ".pdf";
                copy($filename, $destination);
            }
            if (file_put_contents($filename, $imageData)) {
                return true;
            } else {
                throw new Exception("Error in PDF saving", REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }

    /**
     * approvalDetails
     *
     * Find the approval Details for Own Employees/Service Providers/Third Party Company Employees
     *
     * @access public
     * @param $ChangeType = Add or Update on a table | Values are: 1- Add, 2- Update
     * @param $ChangeOn = It is use for change in Employee/Service Provider/Third Party Company Employees master information or payout | Values are: Pass 1- Employee Master Information, 2-Service Provider Master Information, 3-Third Party Company Employee Master Information, 4- Employee Salary, 5-Service Provider Payout, 6-Third Party Company Employee Salary
     * @param $TableName
     * @param $PrimaryKey = primary key of the table
     * @param $PrimaryKeyValue = value of the table where you want to update
     * @param $final_approval_time = use old value in update case
     * @param $final_approval_ids = use old value in update case
     * @param $final_approval_status = use old value in update case
     * @return boolean
     */
    public function approvalDetails($ChangeType = 0, $ChangeOn = 0, $UserId = 0, $TableName = '', $PrimaryKey = '', $PrimaryKeyValue = 0, $final_approval_time = '', $final_approval_ids = '', $final_approval_status = '') {
        $FinalApprovalIds = ['183', '132'];
        $BSAPortalUserIds = ['10', '134'];
        //$BSAPortalAdminIds = ['136'];
        $BSAPortalAdminIds = ['183'];
        if (in_array($UserId, $BSAPortalUserIds)) {
            $ApprovalRequired = 0;
        } else {
            $ApprovalRequired = 1;
        }
        $ApprovalIds = implode('#', $FinalApprovalIds) . '#';
        $HODApprovalRequired = false;
        $FinalApprovalRequired = false;
        switch ($ChangeType) {
            case 1:
                switch ($ChangeOn) {
                    case 1:
                        if (in_array($UserId, $BSAPortalAdminIds)) {
                            $ApprovalRequired = 0;
                        }
                        if ($ApprovalRequired) {
                            $HODApprovalRequired = true;
                            $FinalApprovalRequired = true;
                            $updateData = [
                                'hod_approval_status' => 0,
                                'final_approval_status' => 0,
                                'final_approval_ids' => $ApprovalIds,
                                'approval_type' => $ChangeType
                            ];
                        } else {
                            $updateData = [
                                'hod_approval_status' => 1,
                                'final_approval_status' => 1,
                                'final_approval_ids' => $ApprovalIds,
                                'hod_approval_time' => date('Y-m-d H:i:s'),
                                'final_approval_time' => date('Y-m-d H:i:s'),
                                'approval_type' => $ChangeType
                            ];
                        }
                        break;
                    case 2:
                        if (in_array($UserId, $BSAPortalAdminIds)) {
                            $ApprovalRequired = 0;
                        }
                        if ($ApprovalRequired) {
                            $HODApprovalRequired = true;
                            $FinalApprovalRequired = true;
                            $updateData = [
                                'hod_approval_status' => 0,
                                'final_approval_status' => 0,
                                'final_approval_ids' => $ApprovalIds,
                                'approval_type' => $ChangeType
                            ];
                        } else {
                            $updateData = [
                                'hod_approval_status' => 1,
                                'final_approval_status' => 1,
                                'final_approval_ids' => $ApprovalIds,
                                'hod_approval_time' => date('Y-m-d H:i:s'),
                                'final_approval_time' => date('Y-m-d H:i:s'),
                                'approval_type' => $ChangeType
                            ];
                        }
                        break;
                    case 3:
                        if (in_array($UserId, $BSAPortalAdminIds)) {
                            $ApprovalRequired = 0;
                        }
                        if ($ApprovalRequired) {
                            $HODApprovalRequired = true;
                            $FinalApprovalRequired = true;
                            $updateData = [
                                'hod_approval_status' => 0,
                                'final_approval_status' => 0,
                                'final_approval_ids' => $ApprovalIds,
                                'approval_type' => $ChangeType
                            ];
                        } else {
                            $updateData = [
                                'hod_approval_status' => 1,
                                'final_approval_status' => 1,
                                'final_approval_ids' => $ApprovalIds,
                                'hod_approval_time' => date('Y-m-d H:i:s'),
                                'final_approval_time' => date('Y-m-d H:i:s'),
                                'approval_type' => $ChangeType
                            ];
                        }
                        break;
                    case 4:
                        if ($ApprovalRequired) {
                            $FinalApprovalRequired = true;
                            $updateData = [
                                'approval_status' => 0,
                                'approval_ids' => $ApprovalIds,
                                'approval_type' => $ChangeType
                            ];
                        } else {
                            $updateData = [
                                'approval_status' => 1,
                                'approval_ids' => $ApprovalIds,
                                'approval_time' => date('Y-m-d H:i:s'),
                                'approval_type' => $ChangeType
                            ];
                        }
                        break;
                    case 5:
                        if ($ApprovalRequired) {
                            $FinalApprovalRequired = true;
                            $updateData = [
                                'approval_status' => 0,
                                'approval_ids' => $ApprovalIds,
                                'approval_type' => $ChangeType
                            ];
                        } else {
                            $updateData = [
                                'approval_status' => 1,
                                'approval_ids' => $ApprovalIds,
                                'approval_time' => date('Y-m-d H:i:s'),
                                'approval_type' => $ChangeType
                            ];
                        }
                        break;
                    case 6:
                        if ($ApprovalRequired) {
                            $FinalApprovalRequired = true;
                            $updateData = [
                                'approval_status' => 0,
                                'approval_ids' => $ApprovalIds,
                                'approval_type' => $ChangeType
                            ];
                        } else {
                            $updateData = [
                                'approval_status' => 1,
                                'approval_ids' => $ApprovalIds,
                                'approval_time' => date('Y-m-d H:i:s'),
                                'approval_type' => $ChangeType
                            ];
                        }
                        break;
                    default:
                        throw new Exception('Invalid ChangeOn Provided', REST_Controller::HTTP_BAD_REQUEST);
                }
                break;
            case 2:
                switch ($ChangeOn) {
                    case 1:
                        if (in_array($UserId, $BSAPortalAdminIds)) {
                            $ApprovalRequired = 0;
                        }
                        if ($ApprovalRequired) {
                            $HODApprovalRequired = true;
                            $updateData = [
                                'hod_approval_status' => 0,
                                'approval_type' => $ChangeType,
                                'final_approval_status' => $final_approval_status,
                                'final_approval_ids' => $final_approval_ids,
                                'final_approval_time' => $final_approval_time,
                            ];
                        }
                        break;
                    case 2:
                        if (in_array($UserId, $BSAPortalAdminIds)) {
                            $ApprovalRequired = 0;
                        }
                        if ($ApprovalRequired) {
                            $HODApprovalRequired = true;
                            $updateData = [
                                'hod_approval_status' => 0,
                                'approval_type' => $ChangeType
                            ];
                        }
                        break;
                    case 3:
                        if (in_array($UserId, $BSAPortalAdminIds)) {
                            $ApprovalRequired = 0;
                        }
                        if ($ApprovalRequired) {
                            $HODApprovalRequired = true;
                            $updateData = [
                                'hod_approval_status' => 0,
                                'approval_type' => $ChangeType
                            ];
                        }
                        break;
                    case 4:
                        if ($ApprovalRequired) {
                            $FinalApprovalRequired = true;
                            $updateData = [
                                'approval_status' => 0,
                                'approval_ids' => $ApprovalIds,
                                'approval_type' => $ChangeType
                            ];
                        }
                        break;
                    case 5:
                        if ($ApprovalRequired) {
                            $FinalApprovalRequired = true;
                            $updateData = [
                                'approval_status' => 0,
                                'approval_ids' => $ApprovalIds,
                                'approval_type' => $ChangeType
                            ];
                        }
                        break;
                    case 6:
                        if ($ApprovalRequired) {
                            $FinalApprovalRequired = true;
                            $updateData = [
                                'approval_status' => 0,
                                'approval_ids' => $ApprovalIds,
                                'approval_type' => $ChangeType
                            ];
                        }
                        break;
                    default:
                        throw new Exception('Invalid ChangeOn Provided in Common Model', REST_Controller::HTTP_BAD_REQUEST);
                }
                break;
            default:
                throw new Exception('Invalid ChangeType Provided in Common Model', REST_Controller::HTTP_BAD_REQUEST);
        }
        $WhereCondition[$PrimaryKey] = $PrimaryKeyValue;
        $this->global_model->update($TableName, $updateData, $WhereCondition);
        return true;
        // return [
        //     'ApprovalRequired'      => $ApprovalRequired,
        //     'ApprovalIds'           => $ApprovalIds,
        //     'HODApprovalRequired'   => $HODApprovalRequired,
        //     'FinalApprovalRequired' => $FinalApprovalRequired,
        //     'ApprovalType'          => $ChangeType
        // ];
    }

    function getEmployeeIdByDoxColId($Type = 0, $DoxColId = 0) {
        if ($Type == 1) {
            $Joins = [
                'bsagroup.fe_master f' => ['(m.bsagroup_fe_id=f.fe_id AND f.is_active="Y")', 'INNER'],
                'backoffice.employee e' => ['(f.mobile_no=e.mobile_no AND e.is_active=1)', 'INNER']
            ];
            $Results = $this->global_model->select('doxcol.mobile_login m', ['id' => $DoxColId], 'e.employee_id', $Joins);
            if (isset($Results) && $Results->num_rows() > 0) {
                return $Results->row()->employee_id;
            } else {
                return 0;
            }
        } else if ($Type == 3) {
            return $DoxColId;
        } else {
            return 0;
        }
    }

    function getStatusByDoxColId($Type = 0, $DoxColId = 0) {
        if ($Type == 1) {
            $Joins = [
                'bsagroup.fe_master f' => ['(m.bsagroup_fe_id=f.fe_id AND f.is_active="Y")', 'INNER'],
                'backoffice.employee e' => ['(f.mobile_no=e.mobile_no AND e.is_active=1)', 'INNER']
            ];
            $Results = $this->global_model->select('doxcol.mobile_login m', ['id' => $DoxColId], 'e.employee_id', $Joins);
            if (isset($Results) && $Results->num_rows() > 0) {
                return $Results->row()->employee_id;
            } else {
                throw new Exception("Your are not the valid user", 400);
            }
        } else if ($Type == 3) {
            $Results = $this->global_model->select('backoffice.employee e', ['e.employee_id' => $DoxColId, 'e.is_active' => 1]);
            if (isset($Results) && $Results->num_rows() > 0) {
                return $DoxColId;
            } else {
                throw new Exception("Your are not the valid user", 400);
            }
        } else {
            throw new Exception("Your are not the valid user", 400);
        }
    }

    function getDoxColIdByEmployeeId($EmployeeId) {
        $Employees = $this->global_model->select('employee', ['employee_id' => $EmployeeId, 'is_active' => 1], 'mobile_no');
        if (isset($Employees) && $Employees->num_rows() > 0) {
            $Employee = $Employees->row();
            $Results = $this->global_model->select('bsagroup.fe_master f', ['f.mobile_no' => $Employee->mobile_no, 'f.is_active' => 'Y'], 'f.fe_id,m.id', ['doxcol.mobile_login m' => ['f.fe_id=m.bsagroup_fe_id', 'INNER']]);
            if (isset($Results) && $Results->num_rows() > 0) {
                $Result = $Results->row();
                return [
                    'Type' => 1,
                    'DoxColId' => $Result->id,
                    'BsaGroupId' => $Result->fe_id
                ];
            } else {
                return [
                    'Type' => 3,
                    'DoxColId' => $EmployeeId,
                    'BsaGroupId' => $EmployeeId
                ];
            }
        } else {
            throw new Exception('Invalid Employee Id', 400);
        }
    }

    function uploadNormalFile($File = [], $FileName = '', $UploadPath = '') {
        if (!is_dir($UploadPath)) {
            mkdir($UploadPath, 0755, true);
        }
        $config['upload_path'] = $UploadPath;
        $config['file_name'] = $FileName;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';

        $this->load->library('upload', $config);
//        $filename = $UploadPath . $FileName . ".jpg";
//        if (file_exists($filename)) {
//            $destination = $UploadPath . $FileName . '-' . date('YmdHis') . ".jpg";
//            copy($filename, $destination);
//        }
        if (!$this->upload->do_upload('Images')) {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        } else {
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }
    }

}
