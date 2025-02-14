<?php

declare(strict_types=1);

namespace SpecDoc\Contract\Specification;

use SpecDoc\Contract\Exception\NotSupportedExceptionInterface;
use SpecDoc\Contract\Reader\FileReaderInterface;
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
     * Returns the reader for the file extension. If there is no reader, returns null.
     *
     * @param non-empty-string $ext File extension
     *
     * @return FileReaderInterface|null
     */
    public function getReader(string $ext): ?FileReaderInterface;
}
