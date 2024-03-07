@extends('frontend.layouts.main')
@push('style')
    <style>
        .faq-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border: 2px solid #ccc; 
            border-radius: 10px; 
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .accordion-item {
            margin-bottom: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px; /* Adjusted border radius */
        }

        .accordion-item:first-child {
            border-top-left-radius: 10px; /* Add border radius to top-left of first item */
            border-top-right-radius: 10px; /* Add border radius to top-right of first item */
        }

        .accordion-item:last-child {
            border-bottom-left-radius: 10px; /* Add border radius to bottom-left of last item */
            border-bottom-right-radius: 10px; /* Add border radius to bottom-right of last item */
        }

        .accordion-header {
            background-color: #f4f4f4;
            padding: 15px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease; /* Added border-color transition */
            border-radius: 10px; /* Adjusted border radius */
        }

        .accordion-header:hover {
            background-color: #e0e0e0;
            border-color: #ccc;
        }

        .accordion-content {
            display: none;
            padding: 15px;
            transition: max-height 0.3s ease;
            border-radius: 10px; /* Adjusted border radius */
        }

        .active .accordion-content {
            display: block;
            max-height: 200px;
        }
    </style>
@endpush

@section('main_content')
    <div class="container">
        <h1>Frequently Asked Questions</h1>
        <div class="faq-container"> <!-- Add wrapping container with class faq-container -->
            <div class="accordion">
                @foreach ($faqs as $item)
                <div class="accordion-item">
                    <div class="accordion-header">{{$item->title}}</div>
                    <div class="accordion-content">
                        <p>{!! $item->description!!}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@push('script')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const accordionHeaders = document.querySelectorAll('.accordion-header');

        accordionHeaders.forEach(header => {
            header.addEventListener('click', () => {
                const accordionItem = header.parentElement;
                const accordionContent = accordionItem.querySelector('.accordion-content');
                accordionItem.classList.toggle('active');

                if (accordionItem.classList.contains('active')) {
                    accordionContent.style.display = 'block';
                } else {
                    accordionContent.style.display = 'none';
                }
            });
        });
    });
</script>

@endpush
