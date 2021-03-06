<?hh
namespace GraphQL\Language\AST;

class EnumValueDefinitionNode extends Node
{
    /**
     * @var string
     */
    public string $kind = NodeKind::ENUM_VALUE_DEFINITION;

    /**
     * @var NameNode
     */
    public $name;

    /**
     * @var DirectiveNode[]
     */
    public $directives;
}
