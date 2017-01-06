<?php 

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use App\Language;

class LanguageController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Language Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create a language
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = 0;

        /* Get all data input */
        $data = $request->all();

        /* Init language model to call function in it */
        $languageModel = new Language;

        /* Call function create new language */
        $language = $languageModel->createNewLanguage($data);

        /* If language was created */
        if (!empty($language)) {
            $status = 1;
        } else {
            $status = 0;
        }

        /* Return user */
        return new JsonResponse(['language' => $language, 'status' => $status]);
    }

    /**
     * Update a language.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $status = 0;

        /* Get all data input */
        $data = $request->all();

        /* Find language */
        $language = Language::findOrFail($id);

        /* Call function create new language */
        $result = $language->updateLanguage($data);

        /* If language was created */
        if ($result) {
            $status = 1;
        }
        
        /* Return language */
        return new JsonResponse(['language' => $result, 'status' => $status]);
    }

    /**
     * Remove a language.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* Find language */
        $language = Language::findOrFail($id);

        /* Delete language */
        $status = $language->delete();

        return new JsonResponse(['status' => $status]);
    }
}
