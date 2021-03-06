<?hh //decl
namespace GraphQL\Type\Definition;

/**
 * Class InputObjectField
 * @package GraphQL\Type\Definition
 */
class InputObjectField
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var mixed|null
     */
    public $defaultValue;

    /**
     * @var string|null
     */
    public $description;

    /**
     * @var callback|InputType
     */
    public $type;

    /**
     * Helps to differentiate when `defaultValue` is `null` and when it was not even set initially
     *
     * @var bool
     */
    private bool $defaultValueExists = false;

    /**
     * InputObjectField constructor.
     * @param array $opts
     */
    public function __construct(array $opts)
    {
        foreach ($opts as $k => $v) {
            switch ($k) {
                case 'defaultValue':
                    $this->defaultValue = $v;
                    $this->defaultValueExists = true;
                    break;
                case 'defaultValueExists':
                    break;
                default:
                    $this->{$k} = $v;
            }
        }
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return GraphQlType::resolve($this->type);
    }

    /**
     * @return bool
     */
    public function defaultValueExists()
    {
        return $this->defaultValueExists;
    }
}
