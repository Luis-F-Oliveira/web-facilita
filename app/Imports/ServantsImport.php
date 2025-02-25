<?php

namespace App\Imports;

use App\Models\Servants;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithUpserts;

class ServantsImport implements ToModel, WithUpserts
{
  /**
   * @param array $row
   * 
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row): ?Model
  {
    if (!isset($row[3])) {
      return null;
    }

    return new Servants([
      'enrollment' => $row[0],
      'contract' => $row[1],
      'name' => $this->removeAccents($row[2]),
      'email' => $row[3],
      'active' => true
    ]);
  }

  /**
   * @return string|array
   */
  public function uniqueBy(): string|array
  {
    return 'email';
  }

  /**
   * @param string $string
   * 
   * @return string
   */
  private function removeAccents(string $string): string
  {
    return iconv('UTF-8', 'ASCII//TRANSLIT', $string);
  }
}
