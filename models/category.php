<?php
/**
 * Category Model
 */
class CategoryModel extends Model
{

  /**
   *
   * @return array
   */
  public function getCategorylist()
  {
        $this->query('SELECT * FROM categories ORDER BY name DESC');
		$rows = $this->resultSet();
		return $rows;
  }

  /**
   *
   * @return string
   */
  public function addCategory()
  {
    // Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['submit'])){
			if($post['name'] == ''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}
			// Insert into MySQL
			$this->query('INSERT INTO categories (name,pid) VALUES(:name, :pid)');
			$this->bind(':name', $post['name']);
			$this->bind(':pid', 0);
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'categories');
			}
		}
		return;
  }

  public function deleteCategory($cid=null)
  {
    $this->query('DELETE FROM categories WHERE id = :cid ');
    $this->bind(':cid', $cid);
    $this->execute();
    // Verify
    if($this->lastInsertId()){
      // Redirect
      header('Location: '.ROOT_URL.'category');
    }
  }

  public function view($cid=null)
  {
    $this->query('SELECT * FROM categories WHERE id = :cid');
    $this->bind(':cid', $cid);
    return $this->single();
  }

}
