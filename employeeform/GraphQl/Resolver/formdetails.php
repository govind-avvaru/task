namespace I95dev\employeeform\GraphQl\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Query\Resolver\Value;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class HelloWorld implements ResolverInterface
{
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        return [
            'id' => $args['id'],
            'Date_Of_Birth' => $args['Date_Of_Birth'],
            'Full_Name' => $args['Full_Name'],
            'MobileNo' => $args['MobileNo'],
            'Email' => $args['Email'],
            'Area' => $args['Area'],
            'Team_Name' => $args['Team_Name'],
            'Team_Captain_Name' => $args['Team_Captain_Name']
        ];
    }
}

