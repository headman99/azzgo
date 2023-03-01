import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { CategoryselectorComponent } from './component/categoryselector/categoryselector.component';
import { HeaderComponent } from './component/header/header.component';
import { FooterCartComponent } from './component/footer-cart/footer-cart.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { IonicModule } from '@ionic/angular';
import { FilterCategoryPipe } from './pipes/categoriesfilter';
import { DynamicFormComponent } from './component/smart-modal/dynamic-form/dynamic-form.component';
import { ModalbaseComponent } from './component/smart-modal/smartmodal.controller';
import { ChooseModalComponent } from './component/smart-modal/choose-modal/choose-modal.component';
import { OrderDetailComponent } from './component/order-detail/order-detail.component';
import { PostComponent } from './component/post/post.component';
import { RouterModule } from '@angular/router';
import { MapsAutocompleteComponent } from './component/maps-autocomplete/maps-autocomplete.component';
import { ImagePreloadDirective } from './directive/imgError';
import { CameraComponent } from './component/camera/camera.component';
import { PanelComponent } from './component/panel/panel.component';
import { PassowordStrengthBarComponent } from './component/password-strength-bar/password-strength-bar.component';
import { MessagemodalComponent } from './component/smart-modal/messagemodal/messagemodal.component';
import { PaginationComponent } from './component/pagination/pagination.component';
import { SearchInputComponent } from './component/search-input/search-input.component';
import { ProductItemComponent } from './component/product-item/product-item.component';
import { EditContactComponent } from './edit-contact/edit-contact.component';
import { ElasticTextarea } from './component/elasticTextarea/elasticTextarea';
import { AppointmentComponent } from './component/smart-modal/appointment/appointment.component';
import { SubmitFeedbackComponent } from './component/smart-modal/submit-feedback/submit-feedback.component';
//import { StarRatingModule } from 'ionic5-star-rating';
import { AddaddrestorequestComponent } from './component/addaddrestorequest/addaddrestorequest.component';
import { InfoboxrequestComponent } from './component/infoboxrequest/infoboxrequest.component';



@NgModule({
  declarations: [CategoryselectorComponent,
    HeaderComponent,
    FooterCartComponent,
    FilterCategoryPipe,
    DynamicFormComponent,
    ModalbaseComponent,
    ChooseModalComponent,
    OrderDetailComponent,
    PostComponent,
    MapsAutocompleteComponent,
    ImagePreloadDirective,
    CameraComponent,
    PanelComponent,
    PassowordStrengthBarComponent,
    MessagemodalComponent,
    PaginationComponent,
    SearchInputComponent,
    ProductItemComponent,
    EditContactComponent,
    ElasticTextarea,
    AppointmentComponent,
    SubmitFeedbackComponent,
    AddaddrestorequestComponent,
    InfoboxrequestComponent
  ],
  imports: [
    CommonModule,
    FormsModule,
    RouterModule,
    ReactiveFormsModule,
    IonicModule,
    //StarRatingModule
  
  ],exports:[CategoryselectorComponent,
    HeaderComponent,
    DynamicFormComponent,
    ModalbaseComponent,
    ChooseModalComponent,
    FooterCartComponent,
    FilterCategoryPipe,
    PostComponent,
    OrderDetailComponent,
    MapsAutocompleteComponent,
    ImagePreloadDirective,
    CameraComponent,
    PanelComponent,
    PassowordStrengthBarComponent,
    MessagemodalComponent,
    PaginationComponent,
    SearchInputComponent,
    ProductItemComponent,
    EditContactComponent,
    ElasticTextarea,
    AppointmentComponent,
    SubmitFeedbackComponent,
    AddaddrestorequestComponent,
    InfoboxrequestComponent
  ],
    entryComponents:[ ModalbaseComponent,
      ChooseModalComponent,
      MessagemodalComponent,
      SearchInputComponent,
      AppointmentComponent,
      SubmitFeedbackComponent]
})
export class SharedModule { }
