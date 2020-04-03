define([
    'jquery'
], function ($) {
    'use strict';

    $.widget('mage.faq', {
        options: {},

        _create: function () {
            this.bindEvents();
        },

        bindEvents: function()
        {
            // category click
            $(this.options.elements.categories).on('click', function(event){
                var element = event.target;

                // flag active
                $(this.options.elements.categories).removeClass('active');
                $(element).addClass('active');

                // active questions
                var id = $(element).data('id');
                $(this.options.elements.questions_category).hide();
                $(this.options.elements.question+id).show();
            }.bind(this));

            //  question click
            $(this.options.elements.question_open).on('click', function(event){
                // flag active
                $(event.target).parents(this.options.elements.question_container).toggleClass('active');
            }.bind(this));
        }
    });

    return $.mage.faq;
});
