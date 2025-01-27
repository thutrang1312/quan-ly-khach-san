namespace App\View\Components;

use Illuminate\View\Component;

class ValidationErrors extends components
{
    public $errors;

    public function __construct($errors)
    {
        $this->errors = $errors;
    }

    public function render()
    {
        return view('components.validation-errors');
    }
}
