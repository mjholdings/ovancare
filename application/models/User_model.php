<?php
class User_model extends MY_Model {
	protected $_table = 'users';
	public $register_rules = array(
		'firstname' => array(
			'field' => 'firstname',
			'label' => 'first name',
			'rules' => 'trim|required|xss_clean'
		),
		'lastname' => array(
			'field' => 'lastname',
			'label' => 'last name',
			'rules' => 'trim|required|xss_clean'
		),
		'email' => array(
			'field' => 'email',
			'label' => 'email',
			'rules' => 'trim|required|valid_email|callback_unique_email|xss_clean'
		),
		'username' => array(
			'field' => 'username',
			'label' => 'username',
			'rules' => 'trim|required|callback_unique_username|xss_clean'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'password',
			'rules' => 'trim|required|matches[cpassword]|xss_clean'
		),
		'cpassword' => array(
			'field' => 'cpassword',
			'label' => 'confirm password',
			'rules' => 'trim|required|matches[password]|xss_clean'
		),
		'address' => array(
			'field' => 'address',
			'label' => 'address',
			'rules' => 'trim|required|xss_clean'
		),
		'state' => array(
			'field' => 'state',
			'label' => 'state',
			'rules' => 'trim|required'
		),
		'country' => array(
			'field' => 'country',
			'label' => 'country',
			'rules' => 'trim|required'
		),
		'paypal_email' => array(
			'field' => 'paypal_email',
			'label' => 'paypal email',
			'rules' => 'trim|required|valid_email|callback_unique_email|xss_clean'
		),
		'phone_number' => array(
			'field' => 'phone_number',
			'label' => 'phone number',
			'rules' => 'trim|required|regex_match[/^[0-9]{10}$/]'
		),
		'alternate_phone_number' => array(
			'field' => 'alternate_phone_number',
			'label' => 'alternate phone number',
			'rules' => 'trim|required|regex_match[/^[0-9]{10}$/]'
		)
	);
	public $login_rules = array(
		'username' => array(
			'field' => 'username',
			'label' => 'username',
			'rules' => 'trim|required'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'password',
			'rules' => 'trim|required'
		)
	);
	public $profile_rules = array(
		'firstname' => array(
			'field' => 'firstname',
			'label' => 'firstname',
			'rules' => 'trim|required'
		),
		'lastname' => array(
			'field' => 'lastname',
			'label' => 'lastname',
			'rules' => 'trim|required'
		),
		'email' => array(
			'field' => 'email',
			'label' => 'email',
			'rules' => 'trim|required|valid_email'
		)
	);
	public $password_rules = array(
		'current_password' => array(
			'field' => 'current_password',
			'label' => 'current password',
			'rules' => 'trim|required|callback_password_check'
		),
		'new_password' => array(
			'field' => 'new_password',
			'label' => 'new password',
			'rules' => 'trim|required'
		),
		'confirm_newpassword' => array(
			'field' => 'confirm_newpassword',
			'label' => 'confirm password',
			'rules' => 'trim|required|matches[new_password]'
		)
	);

	function login($username) {
		return $this->db->where('username', $username)->or_where('email', $username)
			->get('users')->row_array();
	}

	function getCountries() {
		return $this->db->select('id,name')->from('countries')->get()->result_array();
	}
	function getState($country_id) {
		return $this->db->select('id,name')->from('states')->where('country_id', $country_id)->get()->result_array();
	}
	function update_user_login($user_id) {
		return $this->db->where('id', $user_id)->update('users', array('online' => '1'));
	}
	function update_user($user_id, $url) {
		return $this->db->where('id', $user_id)->update('users', $url);
	}

	function get_user_by_id($usr_id) {
		return $this->db->get_where('users', array('id' => $usr_id))->row_array();
	}
	function get_user_by_type($type) {
		return $this->db->get_where('users', array('type' => $type))->row_array();
	}

	function checkmail($mail) {
		return $this->db->get_where('users', array('email' => $mail))->row_array();
	}
	function checkuser($username) {
		return $this->db->get_where('users', array('username' => $username))->row_array();
	}

	function getUserCountry() {
		$this->db->select('count(*) as num, countries.name');
		$this->db->from('users');
		$this->db->group_by('users.country');
		$this->db->join('countries', 'users.country=countries.id');
		$query = $this->db->get();
		return $query->result();
	}

	function getUserCountryUserId($user_id) {
		$this->db->select('countries.name,countries.name,sortname');
		$this->db->from('users');
		$this->db->join('countries', 'users.country=countries.id');
		$this->db->where('users.id', $user_id);
		$query = $this->db->get();
		return $query->row_array();
	}
	function custom_query() {
	}
	function getAllNotification($user_id = null) {
		$this->db->from('notification');
		if (!empty($user_id)) {
			$this->db->where('notification_view_user_id', $user_id);
		}
		$this->db->where('notification_is_read', 0);
		$this->db->order_by("notification_created_date", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	function getAllNotificationPaging($notification_viewfor = null, $user_id = null, $limit, $start) {
		$this->db->from('notification');
		$this->db->limit($limit, $start);
		if (!empty($notification_viewfor)) {
			$this->db->where('notification_viewfor', $notification_viewfor);
		}
		if (!empty($user_id)) {
			$this->db->where(" (notification_view_user_id = {$user_id} OR notification_view_user_id = 'all')  ", NULL, false);
		}

		$this->db->order_by("notification_created_date", "desc");
		$data['notifications'] = $this->db->get()->result_array();

		$this->db->from('notification');
		if (!empty($user_id)) {
			$this->db->where(" (notification_view_user_id = {$user_id} OR notification_view_user_id = 'all')  ", NULL, false);
		}
		if (!empty($notification_viewfor)) {
			$this->db->where('notification_viewfor', $notification_viewfor);
		}
		$data['total'] = $this->db->count_all_results();
		return $data;
	}

	/*
	* user group 
	*/
	function checkgroup($group_name, $id) {
		$where['group_name'] = $group_name;
		if (!empty($id)) {
			$where['id !='] = $id;
		}
		return $this->db->get_where('user_groups', $where)->row_array();
	}

	function groupinsert($data) {
		return $this->db->insert('user_groups', $data);
	}

	function update_group($id, $data) {
		return  $this->db->update('user_groups', $data, ['id' => $id]);
	}

	function getgrouplist() {
		return $this->db->query('select user_groups.*, COUNT(integration_tools.id) as tools_count, integration_tools.allow_groups, users.groups, COUNT(users.id) as users_count from user_groups left join integration_tools ON FIND_IN_SET(user_groups.id, integration_tools.allow_groups) left join users ON FIND_IN_SET(user_groups.id, users.groups) GROUP BY user_groups.id ORDER BY user_groups.created_at DESC')->result();
	}

	function getDefaultGroup() {
		return $this->db->get_where('user_groups', ['is_default' => 1])->row();
	}

	function getgroupdetails($id) {
		return $this->db->get_where('user_groups', ['id' => $id])->row();
	}

	function setStarForUser() {
		$get_user_star_3_query = "SELECT order_products.refer_id FROM order_products INNER JOIN `order` ON order_products.order_id = `order`.id WHERE `order`.`status` = 1 AND order_products.refer_id > 1 GROUP BY EXTRACT(month FROM `order`.created_at), order_products.refer_id HAVING SUM(order_products.total) >= 30000000 AND SUM(order_products.total) < 50000000 ORDER BY EXTRACT(month FROM `order`.created_at);";

		$get_user_star_4_query = "SELECT order_products.refer_id FROM order_products INNER JOIN `order` ON order_products.order_id = `order`.id WHERE `order`.`status` = 1 AND order_products.refer_id > 1 GROUP BY EXTRACT(month FROM `order`.created_at), order_products.refer_id HAVING SUM(order_products.total) >= 50000000 AND SUM(order_products.total) < 100000000 ORDER BY EXTRACT(month FROM `order`.created_at);";

		$get_user_star_5_query = "SELECT order_products.refer_id FROM order_products INNER JOIN `order` ON order_products.order_id = `order`.id WHERE `order`.`status` = 1 AND order_products.refer_id > 1 GROUP BY EXTRACT(month FROM `order`.created_at), order_products.refer_id HAVING SUM(order_products.total) >= 100000000 ORDER BY EXTRACT(month FROM `order`.created_at);";

		$results_user_star_3 = $this->db->query($get_user_star_3_query)->result_array();
		$results_user_star_4 = $this->db->query($get_user_star_4_query)->result_array();
		$results_user_star_5 = $this->db->query($get_user_star_5_query)->result_array();

		if (count($results_user_star_3) > 0) {
			$arr_id_user_star_3 = [];
			foreach ($results_user_star_3 as $result_user_star_3) {
				array_push($arr_id_user_star_3, $result_user_star_3['refer_id']);
			}
			$update_user_star_3 = "UPDATE users SET user_star = 3 WHERE id IN (" . implode(",", $arr_id_user_star_3) . ")";
			$this->db->query($update_user_star_3);
		}

		if (count($results_user_star_4) > 0) {
			$arr_id_user_star_4 = [];
			foreach ($results_user_star_4 as $result_user_star_4) {
				array_push($arr_id_user_star_4, $result_user_star_4['refer_id']);
			}
			$update_user_star_4 = "UPDATE users SET user_star = 4 WHERE id IN (" . implode(",", $arr_id_user_star_4) . ")";
			$this->db->query($update_user_star_4);
		}

		if (count($results_user_star_5) > 0) {
			$arr_id_user_star_5 = [];
			foreach ($results_user_star_5 as $result_user_star_5) {
				array_push($arr_id_user_star_5, $result_user_star_5['refer_id']);
			}
			$update_user_star_5 = "UPDATE users SET user_star = 5 WHERE id IN (" . implode(",", $arr_id_user_star_5) . ")";
			$this->db->query($update_user_star_5);
		}
	}

	/*
	* User
	*/
	// Lấy toàn bộ cây dưới dạng mảng
	public function getTree() {
		$query = $this->db->get('users');
		return $query->result_array();
	}

	// Lấy thông tin của một node
	public function getNode($id) {
		$query = $this->db->get_where('users', array('id' => $id));
		return $query->row_array();
	}

	// Lấy các con của một node
	public function getChildren($id) {
		$query = $this->db->get_where('users', array('refid' => $id));
		return $query->result_array();
	}

	// Lấy toàn bộ phần con bằng cách đệ quy
	public function getAllDescendants($id) {
		$descendants = [];

		$children = $this->getChildren($id);
		foreach ($children as $child) {
			$descendants[] = $child['id'];
			$grandChildren = $this->getAllDescendants($child['id']);
			$descendants = array_merge($descendants, $grandChildren);
		}

		return $descendants;
	}

	/*
	* Branch 
	*/
	function checkbranch($branch_name, $id) {
		$where['name'] = $branch_name;
		if (!empty($id)) {
			$where['id !='] = $id;
		}
		return $this->db->get_where('branch', $where)->row_array();
	}

	function branchinsert($data) {
		return $this->db->insert('branch', $data);
	}

	function update_branch($id, $data) {
		return  $this->db->update('branch', $data, ['id' => $id]);
	}

	function getbranchlist() {
		return $this->db->query('select * from branch')->result();
	}

	function getDefaultBranch() {
		return $this->db->get_where('branch', ['is_default' => 1])->row();
	}

	function getbranchdetails($id) {
		return $this->db->get_where('branch', ['id' => $id])->row();
	}

	// TÍNH THƯỞNG ***************
	public function calculate_commissions() {

		// Kết nối đến cơ sở dữ liệu
		$db = $this->db;

		// Xóa dữ liệu cũ trong bảng user_commission
		$db->truncate('user_comission');

		// Lấy tất cả các mục trong bảng user_revenue
		$query = "SELECT * FROM user_revenue";
		$user_revenues = $db->query($query)->result();

		foreach ($user_revenues as $revenue) {
			$user_id = $revenue->user_id;
			$order_id = $revenue->order_id;
			$product_id = $revenue->product_id;
			$personal_revenue = $revenue->revenue;
			$direct_revenue = $revenue->revenue_direct;
			$indirect_revenue = $revenue->revenue_indirect;
			$created_time = $revenue->created_time;

			// Lấy cấp độ hiện tại của user
			$current_rank = $this->get_user_current_rank($user_id);

			// Lấy danh sách điều kiện thưởng từ bảng award_level
			$award_levels = $this->get_award_levels();

			foreach ($award_levels as $level) {

				if ($current_rank == $level) {
					// Kiểm tra điều kiện doanh thu cá nhân cho cấp độ hiện tại
					if ($level->minimum_earning > 0 && $personal_revenue < $level->minimum_earning) {
						continue;
					}

					// Kiểm tra số lượng thành viên tuyển dụng trực tiếp
					$user_recruitment = $this->get_user_recruitment($user_id);
					if ($level->recruitment_number > 0 && $user_recruitment->total_direct < $level->recruitment_number) {
						continue;
					}

					// Kiểm tra cấp độ thành viên trực tiếp
					if ($level->recruitment_level > 0 && !$this->check_direct_member_level($user_recruitment->ids_direct, $level->recruitment_level)) {
						continue;
					}

					// Tính thưởng doanh thu cá nhân
					if ($level->sale_comission_rate > 0) {
						$commission_value = $personal_revenue * ($level->sale_comission_rate / 100);
						$this->update_commission($user_id, $order_id, $product_id, $created_time, 'sales_personal', 'percentage', $commission_value);
					} elseif ($level->bonus > 0) {
						$this->update_commission($user_id, $order_id, $product_id, $created_time, 'sales_personal', 'fixed', $level->bonus);
					}

					// Tính thưởng doanh thu trực tiếp
					if ($level->sale_comission_direct > 0) {
						$commission_value = $direct_revenue * ($level->sale_comission_direct / 100);
						$this->update_commission($user_id, $order_id, $product_id, $created_time, 'sales_direct', 'percentage', $commission_value);
					}

					// Tính thưởng doanh thu gián tiếp
					if ($level->sale_comission_indirect > 0) {
						$commission_value = $indirect_revenue * ($level->sale_comission_indirect / 100);
						$this->update_commission($user_id, $order_id, $product_id, $created_time, 'sales_indirect', 'percentage', $commission_value);
					}
				}
			}
		}
	}

	// Hàm lấy cấp độ hiện tại của user
	private function get_user_current_rank($user_id) {
		$query = "SELECT user_level FROM user_rank WHERE user_id = ?";
		return $this->db->query($query, array($user_id))->row()->user_level;
	}

	// Hàm lấy danh sách cấp bậc từ bảng award_level
	private function get_award_levels() {
		$query = "SELECT * FROM award_level ORDER BY level_number ASC";
		return $this->db->query($query)->result();
	}

	// Hàm lấy thông tin tuyển dụng của user
	private function get_user_recruitment($user_id) {
		$query = "SELECT * FROM user_recruitment WHERE user_id = ?";
		return $this->db->query($query, array($user_id))->row();
	}

	// Hàm kiểm tra cấp độ thành viên trực tiếp
	private function check_direct_member_level($ids_direct, $required_level) {
		if (empty($ids_direct)) {
			return false;
		}

		$ids = explode(',', $ids_direct);
		$placeholders = implode(',', array_fill(0, count($ids), '?'));
		$query = "SELECT COUNT(*) AS count FROM user_rank WHERE user_id IN ($placeholders) AND user_level >= ?";
		$result = $this->db->query($query, array_merge($ids, array($required_level)))->row()->count;

		return $result > 0;
	}

	// Hàm cập nhật thông tin hoa hồng vào bảng user_commission
	private function update_commission($user_id, $order_id, $product_id, $created_time, $method, $type, $value) {
		$data = array(
			'user_id' => $user_id,
			'order_id' => $order_id,
			'product_id' => $product_id,
			'comission_method' => $method,
			'comission_type' => $type,
			'comission_value' => $value,
			'created_at' => $created_time,
			'comission_date' => date('Y-m-d H:i:s')
		);
		$this->db->insert('user_comission', $data);
	}


	// public function update_all_users_comission() {
	// 	// Lấy danh sách tất cả người dùng
	// 	$users = $this->db->get('users')->result();

	// 	// Duyệt qua từng người dùng và tính toán thưởng
	// 	foreach ($users as $user) {
	// 		// Lấy danh sách đơn hàng của người dùng
	// 		$this->db->select('id');
	// 		$this->db->from('order');
	// 		$this->db->where('user_id', $user->id);
	// 		$orders = $this->db->get()->result();

	// 		// Tính toán thưởng cho từng đơn hàng của người dùng
	// 		foreach ($orders as $order) {
	// 			$this->calculate_and_update_comission($order->id);
	// 		}
	// 	}
	// }

	// public function calculate_and_update_comission($order_id) {
	// 	// Lấy thông tin order
	// 	$this->db->select('user_id, total');
	// 	$this->db->from('order');
	// 	$this->db->where('id', $order_id);
	// 	$order = $this->db->get()->row();

	// 	if (!$order) {
	// 		return false; // Nếu không có đơn hàng, kết thúc hàm
	// 	}

	// 	$user_id = $order->user_id;
	// 	$personal_revenue = $order->total;

	// 	// Lấy cấp bậc của người dùng
	// 	$user_award = $this->get_user_award($user_id);
	// 	$award_id = $user_award->award_id;
	// 	$user_level = $user_award->user_level;

	// 	// Lấy thông tin cấp bậc từ bảng award_level
	// 	$award_level = $this->get_award_level($award_id);

	// 	// Kiểm tra điều kiện đạt thưởng
	// 	if ($this->check_conditions($user_id, $award_level)) {
	// 		// Tính thưởng cá nhân
	// 		$personal_comission = $this->calculate_personal_comission($personal_revenue, $award_level);

	// 		// Cập nhật thưởng cá nhân vào bảng user_comission
	// 		$this->update_user_comission($order_id, $user_id, 'percentage', 'sales_personal', $personal_comission);

	// 		// Tính thưởng trực tiếp và gián tiếp
	// 		$this->calculate_direct_and_indirect_comission($order_id, $user_id, $personal_revenue, $award_level);
	// 	}
	// }



	// private function check_conditions($user_id, $award_level) {
	// 	// Kiểm tra doanh thu cá nhân tối thiểu
	// 	$personal_revenue = $this->get_user_revenue($user_id, 'revenue');
	// 	if ($personal_revenue < $award_level->minimum_earning) {
	// 		return false;
	// 	}

	// 	// Kiểm tra số lượng người mời trực tiếp
	// 	if ($award_level->recruitment_number > 0) {
	// 		$recruitment = $this->get_user_recruitment($user_id);
	// 		if ($recruitment->total_direct < $award_level->recruitment_number) {
	// 			return false;
	// 		}
	// 	}

	// 	// Kiểm tra cấp độ người mời trực tiếp
	// 	if ($award_level->recruitment_level > 0) {
	// 		$direct_users = $this->get_direct_users($user_id);
	// 		$qualified_directs = 0;
	// 		foreach ($direct_users as $direct_user) {
	// 			$direct_user_award = $this->get_user_award($direct_user);
	// 			if ($direct_user_award->user_level >= $award_level->recruitment_level) {
	// 				$qualified_directs++;
	// 			}
	// 		}
	// 		if ($qualified_directs < $award_level->recruitment_number) {
	// 			return false;
	// 		}
	// 	}

	// 	return true;
	// }

	// private function calculate_personal_comission($revenue, $award_level) {
	// 	return $revenue * ($award_level->sale_comission_rate / 100);
	// }

	// private function calculate_direct_and_indirect_comission($order_id, $user_id, $personal_revenue, $award_level) {
	// 	// Lấy danh sách user_id trực tiếp và gián tiếp từ bảng user_recruitment
	// 	$direct_users = $this->get_direct_users($user_id);
	// 	$indirect_users = $this->get_indirect_users($user_id);

	// 	// Tính thưởng trực tiếp cho các user trực tiếp
	// 	foreach ($direct_users as $direct_user) {
	// 		$direct_revenue = $this->get_user_revenue($direct_user, 'revenue_direct');
	// 		$direct_comission = $direct_revenue * ($award_level->sale_comission_direct / 100);
	// 		$this->update_user_comission($order_id, $direct_user, 'percentage', 'sales_direct', $direct_comission);
	// 	}

	// 	// Tính thưởng gián tiếp cho các user gián tiếp
	// 	foreach ($indirect_users as $indirect_user) {
	// 		$indirect_revenue = $this->get_user_revenue($indirect_user, 'revenue_indirect');
	// 		$indirect_comission = $indirect_revenue * ($award_level->sale_comission_indirect / 100);
	// 		$this->update_user_comission($order_id, $indirect_user, 'percentage', 'sales_indirect', $indirect_comission);
	// 	}
	// }

	// private function update_user_comission($order_id, $user_id, $comission_type, $comission_method, $comission_value) {
	// 	$data = array(
	// 		'order_id' => $order_id,
	// 		'user_id' => $user_id,
	// 		'comission_type' => $comission_type,
	// 		'comission_method' => $comission_method,
	// 		'comission_value' => $comission_value,
	// 		'updated_time' => date('Y-m-d H:i:s')
	// 	);
	// 	$this->db->insert('user_comission', $data);
	// }

	// private function get_user_award($user_id) {
	// 	$this->db->select('award_id, user_level');
	// 	$this->db->from('user_rank');
	// 	$this->db->where('user_id', $user_id);
	// 	return $this->db->get()->row();
	// }

	// private function get_award_level($award_id) {
	// 	$this->db->select('*');
	// 	$this->db->from('award_level');
	// 	$this->db->where('id', $award_id);
	// 	return $this->db->get()->row();
	// }

	// private function get_direct_users($user_id) {
	// 	$this->db->select('ids_direct');
	// 	$this->db->from('user_recruitment');
	// 	$this->db->where('user_id', $user_id);
	// 	$query = $this->db->get();
	// 	$result = $query->row();
	// 	return $result ? explode(',', $result->ids_direct) : [];
	// }

	// private function get_indirect_users($user_id) {
	// 	$this->db->select('ids_indirect');
	// 	$this->db->from('user_recruitment');
	// 	$this->db->where('user_id', $user_id);
	// 	$query = $this->db->get();
	// 	$result = $query->row();
	// 	return $result ? explode(',', $result->ids_indirect) : [];
	// }

	// private function get_user_revenue($user_id, $revenue_type) {
	// 	$this->db->select_sum($revenue_type);
	// 	$this->db->from('user_revenue');
	// 	$this->db->where('user_id', $user_id);
	// 	$query = $this->db->get();
	// 	return $query->row()->$revenue_type;
	// }

	// private function get_user_recruitment($user_id) {
	// 	$this->db->select('total_direct');
	// 	$this->db->from('user_recruitment');
	// 	$this->db->where('user_id', $user_id);
	// 	return $this->db->get()->row();
	// }
}
