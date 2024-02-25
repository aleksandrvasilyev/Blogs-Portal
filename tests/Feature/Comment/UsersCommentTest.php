<?php

namespace Tests\Feature\Comment;


use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class UsersCommentTest extends TestCase
{
    use LazilyRefreshDatabase;


    // admin page

        // his comments
            // positive
                // C -
                // R // test_user_can_view_edit_form_for_his_comment
                // U // test_user_can_update_his_comment_with_valid_data
                // D // test_user_can_delete_his_comment

            // negative
                // C -
                // R // test_user_cannot_view_edit_form_for_not_existing_comment
                // U // test_user_cannot_update_his_comment_with_invalid_data
                // U // test_user_cannot_update_non_existing_comment_with_valid_data
                // D // test_user_cannot_delete_non_existing_comment

        // not his comments
            // C -
            // R // test_user_cannot_view_edit_form_for_not_his_comment
            // U // test_user_cannot_update_not_his_comment_with_valid_data
            // U // test_user_cannot_update_not_his_comment_with_invalid_data
            // D // test_user_cannot_delete_not_his_existing_comment



    // home page

        // his comments
            // positive
                // C // test_user_can_create_a_comment_with_valid_data
                // R // test_user_can_read_his_comment
                // U // test_guest_can_update_his_comment_with_valid_data
                // D // test_user_can_delete_his_existing_comment

            // negative
                // C // test_user_cannot_create_a_comment_with_invalid_data
                // R // test_user_cannot_read_non_existing_comment
                // U // test_user_cannot_update_non_existing_comment
                // D // test_user_cannot_delete_non_existing_comment

            // not his comments
                // C // test_user_cannot_create_a_comment_as_another_user_with_valid_data
                // C // test_user_cannot_create_a_comment_as_another_user_with_invalid_data
                // R // test_user_can_read_not_his_comment
                // U // test_user_cannot_update_not_his_comment_with_valid_data
                // U // test_user_cannot_update_not_his_comment_with_invalid_data
                // D // test_user_cannot_delete_not_his_comment

}
