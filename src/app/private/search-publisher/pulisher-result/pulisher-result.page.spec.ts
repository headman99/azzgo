import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { PulisherResultPage } from './pulisher-result.page';

describe('PulisherResultPage', () => {
  let component: PulisherResultPage;
  let fixture: ComponentFixture<PulisherResultPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PulisherResultPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(PulisherResultPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
