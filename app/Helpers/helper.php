<?php
	function roleExists($role, $roleArray) {
		foreach ($roleArray as $r) {
			if($role->id == $r->id)
				return true;
		}
		return false;
	}