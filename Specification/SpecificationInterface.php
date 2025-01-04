<?php

declare(strict_types=1);

namespace SpecDoc\Contract\Specification;

use SpecDoc\Contract\Builder\BuilderInterface;
use SpecDoc\Contract\Exception\NotSupportedExceptionInterface;
use SpecDoc\Contract\Parser\ParserInterface;
use SpecDoc\Contract\Rule\RuleSetInterface;

/**
 * Specification interface. Responsible for the support of incoming content,
 * the ability to update it within the specification, the rules of parsing and
 * document building.
 */
interface SpecificationInterface
{
    /**
     * Returns the name of the specification.
     *
     * @return string
     */
    public function name(): string;

    /**
     * Returns a list of supported versions of the specification.
     *
     * @return iterable<string>
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
     * Sets the default version of the specification. If the type does not match, throws an exception.
     *
     * @param RuleSetInterface $version
     *
     * @return self
     * @throws NotSupportedExceptionInterface
     */
    public function setDefaultVersion(RuleSetInterface $version): self;

    /**
     * Returns the default version of the specification.
     *
     * @return RuleSetInterface
     */
    public function getDefaultVersion(): RuleSetInterface;

    /**
     * Returns a set of rules for the requested specification version. If the version is missing, an
     * exception is thrown.
     *
     * @param string $version
     *
     * @return RuleSetInterface
     * @throws NotSupportedExceptionInterface
     */
    public function getVersion(string $version): RuleSetInterface;

    /**
     * Adds a version of the specification. If the specification type does not match, an exception is
     * thrown.
     *
     * @param RuleSetInterface $version
     *
     * @return self
     * @throws NotSupportedExceptionInterface
     */
    public function addVersion(RuleSetInterface $version): self;
}
