<?php

declare(strict_types=1);

namespace SpecDoc\Contract\Specification;

use SpecDoc\Contract\Builder\BuilderInterface;
use SpecDoc\Contract\Exception\NotSupportedExceptionInterface;
use SpecDoc\Contract\Parser\ParserInterface;
use SpecDoc\Contract\Reader\ReaderInterface;
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
     * @return non-empty-string
     */
    public function name(): string;

    /**
     * Returns a list of supported versions of the specification.
     *
     * @return iterable<non-empty-string>
     */
    public function versions(): iterable;

    /**
     * Returns a flag indicating whether the resource is supported.
     *
     * @param string $resource
     *
     * @return bool
     */
    public function supports(string $resource): bool;

    /**
     * Returns the specific parser for the specification, or null if not set.
     *
     * @return null|ParserInterface
     */
    public function getParser(): ?ParserInterface;

    /**
     * Sets the specific parser for the specification.
     *
     * @param ParserInterface $parser
     *
     * @return static
     */
    public function setParser(ParserInterface $parser): static;

    /**
     * Returns the specific builder for the specification, or null if not set.
     *
     * @return null|BuilderInterface
     */
    public function getBuilder(): ?BuilderInterface;

    /**
     * Sets the specific builder for the specification.
     *
     * @param BuilderInterface $builder
     *
     * @return static
     */
    public function setBuilder(BuilderInterface $builder): static;

    /**
     * Returns the specific reader for the specification, or null if not set.
     *
     * @return null|ReaderInterface
     */
    public function getReader(): ?ReaderInterface;

    /**
     * Sets the specific reader for the specification.
     *
     * @param ReaderInterface $reader
     *
     * @return static
     */
    public function setReader(ReaderInterface $reader): static;

    /**
     * Returns the default version of the specification if set, or null otherwise.
     *
     * @return null|RuleSetInterface
     */
    public function getDefaultVersion(): ?RuleSetInterface;

    /**
     * Sets the default version of the specification.
     *
     * @param RuleSetInterface $version
     *
     * @return static
     */
    public function setDefaultVersion(RuleSetInterface $version): static;

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
}
