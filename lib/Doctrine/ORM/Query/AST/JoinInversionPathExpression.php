<?php

namespace Doctrine\ORM\Query\AST;

class JoinInversionPathExpression extends Node
{
    /**
     * @var string
     */
    public $associationField;

    /**
     * @var string
     */
    public $targetAssociation;

    /**
     * @var RangeVariableDeclaration
     */
    public $rangeVariableDeclaration;

    /**
     * @param RangeVariableDeclaration $rangeVariableDeclaration
     * @param string $associationField
     * @param string $targetAssociation
     */
    public function __construct(
        RangeVariableDeclaration $rangeVariableDeclaration,
        $associationField,
        $targetAssociation
    ) {
        $this->associationField = $associationField;
        $this->targetAssociation = $targetAssociation;
        $this->rangeVariableDeclaration = $rangeVariableDeclaration;
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch($sqlWalker)
    {
        return $sqlWalker->walkPathExpression($this);
    }
}
