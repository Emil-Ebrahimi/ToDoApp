<?php

namespace App\Http\Traits;

use Carbon\Carbon;

trait TasksTrait {

public function getDates() {
  return ['created_at', 'updated_at'];
}

}

 ?>
