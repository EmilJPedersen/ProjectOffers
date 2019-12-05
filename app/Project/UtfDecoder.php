<?php 

namespace App\Project;

use danielme85\ForceUTF8\Encoding;

trait UtfDecoder {

    /**
     * Array of search / replace values.
     * 
     * @var array
     */
    public $conversion = [
        'Ã†'    => 'Æ',
        'Ã¦'    => 'æ',
        'ÃË'    => 'Ø',
        'Ã˜'    => 'Ø',
        'Ã¸'    => 'ø',
        'Ã¸'    => 'ø',
        'Ã¥'    => 'å',
        'ï¿½'   => 'å',
        'Ã…'    => 'Å',
        'Ã©'    => 'é',
        'â€“'   => '–',
        'Â½'    => '½',
        'â€¢'   => '•'
    ];

    /**
     * The decoding function, which basically just replaces the
     * search values with the replace values, from the conversion
     * array as seen above.
     * 
     * @param   string  $value
     * @return  string
     */
    public function decodeString($value)
    {
        $search = array_keys($this->conversion);
        $replace = array_values($this->conversion);

        return str_replace($search, $replace, $value);
    }

    public function getNameAttribute($value)
    {
        return $this->decodeString($value);
    }

    public function getDescriptionAttribute($value)
    {
        return $this->decodeString($value);
    }

    public function getItemNameAttribute($value)
    {
        return $this->decodeString($value);
    }

    public function getProjectNameAttribute($value)
    {
        return $this->decodeString($value);
    }

    public function getCustomerNameAttribute($value)
    {
        return $this->decodeString($value);
    }

    public function getNotesAttribute($value)
    {
        return $this->decodeString($value);
    }

    public function getTitleAttribute($value)
    {
        return $this->decodeString($value);
    }

    public function getLabelAttribute($value)
    {
        return $this->decodeString($value);
    }

    public function getNotesCustomerAttribute($value)
    {
        return $this->decodeString($value);
    }

    public function getFirstNameAttribute($value)
    {
        return $this->decodeString($value);
    }

    public function getMiddleNameAttribute($value)
    {
        return $this->decodeString($value);
    }

    public function getLastNameAttribute($value)
    {
        return $this->decodeString($value);
    }

    public function getFileTitleAttribute($value)
    {
        return $this->decodeString($value);
    }

    public function getFilenameAttribute($value)
    {
        return $this->decodeString($value);
    }

    public function getFiledescAttribute($value)
    {
        return $this->decodeString($value);
    }

}