<?php

namespace Hexafuchs\Audit\Checks;

/**
 * Result returned from the check, used to construct the report.
 */
class CheckResult
{
    /**
     * @param  CheckState  $state  state that describes the urgency to change something
     * @param  string|null  $message  additional information
     * @param  string|null  $name  name of the check
     * @param  string|null  $group  group of the check
     */
    public function __construct(
        public CheckState $state,
        public ?string $message = null,
        public ?string $name = null,
        public ?string $group = null,
    ) {}

    /**
     * Creates a result that has the state success.
     */
    public static function success(): self
    {
        return new self(CheckState::SUCCESS);
    }

    /**
     * Creates a result that has the state info with a description.
     */
    public static function info(string $message): self
    {
        return new self(CheckState::INFO, $message);
    }

    /**
     * Creates a result that has the state warning with a description.
     */
    public static function warning(string $message): self
    {
        return new self(CheckState::WARNING, $message);
    }

    /**
     * Creates a result that has the state fatal with a description.
     */
    public static function fatal(string $message): self
    {
        return new self(CheckState::FATAL, $message);
    }

    /**
     * Creates a new result and replaces the group.
     */
    public function group(string $group): self
    {
        return new CheckResult(
            $this->state,
            $this->message,
            $this->name,
            $group,
        );
    }

    /**
     * Creates a new result and replaces the message.
     */
    public function message(string $message): self
    {
        return new CheckResult(
            $this->state,
            $message,
            $this->name,
            $this->group,
        );
    }

    /**
     * Creates a new result and replaces the name.
     */
    public function name(string $name): self
    {
        return new CheckResult(
            $this->state,
            $this->message,
            $name,
            $this->group,
        );
    }

    /**
     * Creates a new result and replaces the state.
     */
    public function state(CheckState $state): self
    {
        return new CheckResult(
            $state,
            $this->message,
            $this->name,
            $this->group,
        );
    }
}
