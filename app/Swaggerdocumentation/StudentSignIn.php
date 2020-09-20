<?php

/**
 * @OA\Schema(
 *     description="Some simple request signIn student",
 *     type="object",
 *     title=" student sign up request",
 * )
 */
class  StudentSignIn
{
    /**
     * @OA\Property(
     *     title="email",
     *     description="email",
     *     format="string",
     *     example="admin@test.com"
     * )
     *
     * @var string
     */
    public $email;
    /**
     * @OA\Property(
     *     title="password",
     *     description="select password",
     *     format="string",
     *     example=12345678
     * )
     *
     * @var string
     */
    public $password;
}