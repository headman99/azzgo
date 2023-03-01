import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { MessagemodalComponent } from './messagemodal.component';

describe('MessagemodalComponent', () => {
  let component: MessagemodalComponent;
  let fixture: ComponentFixture<MessagemodalComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MessagemodalComponent ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(MessagemodalComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
