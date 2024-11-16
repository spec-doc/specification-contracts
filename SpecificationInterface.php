<?php

declare(strict_types=1);

namespace SpecDoc\Contract\Specification;

use SpecDoc\Contract\Exception\NotSupportedExceptionInterface;
use SpecDoc\Contract\Parser\ParserInterface;

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
     * Returns whether this class supports the given resource.
     *
     * @param string $resource
     *
     * @return bool
     */
    public function supports(string $resource): bool;

    /**
     * Returns the parser for the specification. If a version is specified, returns an
     * implementation for a specific version of the specification.
     *
     * @param string|null $version
     *
     * @return ParserInterface
     * @throws NotSupportedExceptionInterface If the specified version is not supported
     */
    public function getParser(?string $version = null): ParserInterface;

    /**
     * Returns the builder for the specification. If a version is specified, returns an
     * implementation for a specific version of the specification.
     *
     * @param string|null $version
     *
     * @return BuilderInterface
     * @throws NotSupportedExceptionInterface If the specified version is not supported
     */
    public function getBuilder(?string $version = null): BuilderInterface;
}
