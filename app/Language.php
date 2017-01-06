<?php  

namespace App;

use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'languages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'key_name', 'default', 'status', 'ordering'];

    /**
     * Create new language
     * @param  Array $data   The data input
     * @return Int           Status true or false
     */
    public function createNewLanguage ($data) 
    {
        // Default properties
        if (isset($data['default'])) {
            $data['default'] == 1;

            // Call function change status
            $this->changeStatus();

        } else {
            $data[] = ['default' => 0];
        }

        $data['key_name'] = str_slug($data['key_name'], '_');

        $lang = $this->checkExists($data['key_name']);

        if (!empty($lang)) {
            return array();
        } else {
            /* Create new language */
            $language = self::create($data);

            return $language;
        }
    }

    /**
     * Update language
     * @param  Array $data   The data input
     * @return Int           Status true or false
     */
    public function updateLanguage ($data) 
    {
        // Default properties
        if (isset($data['default'])) {
            $data['default'] == 1;

            // Call function change status
            $this->changeStatus();

        } else {
            $data[] = ['default' => 0];
        }

        $data['key_name'] = str_slug($data['key_name'], '_');

        $lang = $this->checkExists($data['key_name'], $this->id);

        if (!empty($lang)) {
            return array();
        } else {
            // Update language
            $status = self::update($data);

            return $this;
        }
    }

    /**
     * Check item is exists in system
     * @param  String  $keyName The language key name
     * @param  Integer $id      The id language
     * @return Object           The language
     */
    public function checkExists($keyName, $id = null)
    {
        // Check exists when create
        if ($id == null) {
            $language = self::where('key_name', $keyName)->first();

        // Check exists when edit
        } else {
            $language = self::where('key_name', $keyName)->where('id', '!=', $id)->first();
        }

        return $language;
    }

    /**
     * Change language status
     * @return Void 
     */
    public function changeStatus()
    {
        // Find language
        $language = self::where('default', 1)->first();

        if (!empty($language)) {
            // Change status
            $language->default = 0;

            $language->save();
        }
    }
}
