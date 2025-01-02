<?php

declare(strict_types=1);

namespace SpecDoc\Contract\Specification;

use SpecDoc\Contract\Exception\NotSupportedExceptionInterface;
use SpecDoc\Contract\Parser\ParserInterface;
use SpecDoc\Contract\Builder\BuilderInterface;
use SpecDoc\Contract\Rule\RuleInterface;

/**
 * Specification interface. Responsible for the support of incoming content,
 * the ability to update it within the specification, the rules of parsing and
 * document building.
 */
interface SpecificationInterface
{
    /**
     * Returns the type of the specification.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Returns a list of supported versions of the specification.
     *
     * @return iterable
     */
    public function supportVersions(): iterable;

    /**
     * Returns a flag indicating whether the resource is supported.
     *
     * @param string $resource
     *
     * @return bool
     */
    public function supports(string $resource): bool;

    /**
     * Returns the parser for the specification.
     *
     * @return ParserInterface
     */
    public function getParser(): ParserInterface;

    /**
     * Returns the builder for the specification.
     *
     * @return BuilderInterface
     */
    public function getBuilder(): BuilderInterface;

    /**
     * Returns an array of content handling rules for the specification. If the specified version is missing,
     * an exception is thrown.
     *
     * @param string $version
     *
     * @return array<RuleInterface>
     * @throws NotSupportedExceptionInterface
     */
    public function getRules(string $version = 'last'): array;
}
